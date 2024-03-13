<?php

namespace App\Http\Controllers;

use App\Library\Common;
use App\Models\Attendance;
use App\Models\BreakTimes;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index() {
        $info = Common::Info();
        if(empty($info)) {
            $info['status'] = 0;
        }
        return view('index', compact('info'));
    }
    public function attendance(Request $request) {
        $num = 0;
        $date_list = [];
        $dates = Attendance::groupBy('date')->get('date');
        foreach($dates as $date) {
            array_push($date_list, $date['date']);
        }
        if($request->has('prev')) {
            $num = $request['num'] - 1;
        }
        if($request->has('next')) {
            $num = $request['num'] + 1;
        }
        $users = User::all();
        $attendances = Attendance::with('user')->where('date', '=', $date_list[$num])->paginate(5);
        return view('attendance', compact('num', 'date_list', 'users', 'attendances'));
    }
    public function clock(Request $request) {
        $date = Carbon::now()->format('Y-m-d');
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $info = Common::Info();
        if($request->has('clock_in')) {
            $param = [
                'user_id' => Auth::user()->id,
                'date' => Carbon::now()->format('Y-m-d'),
                'status' => 1,
                'clock_in' => $now,
            ];
            Attendance::create($param);
            return redirect('/');
        }
        if($request->has('clock_out')) {
            $break_times_total = Common::BreakTimesTotal();
            $break_times = Common::SecondToTime($break_times_total);
            $time_worked_second = Common::TimeDiff($info['clock_in']) - $break_times_total;
            $time_worked = Common::SecondToTime($time_worked_second);
            $param = [
                'status' => 3,
                'clock_out' => $now,
                'break_times' => $break_times,
                'time_worked' => $time_worked,
            ];
            Attendance::find($info->id)->update($param);
            return redirect('/');
        }
    }
    public function break(Request $request) {
        $date = Carbon::now()->format('Y-m-d');
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $info = Common::Info();
        if($request->has('break_begins')) {
            $param = [
                'status' => 2,
            ];
            Attendance::find($info->id)->update($param);
            $param = [
                'attendance_id' => $info['id'],
                'break_begin' => $now,
            ];
            BreakTimes::create($param);
            return redirect('/');
        }
        if($request->has('break_ends')) {
            $param = [
                'status' => 1,
            ];
            Attendance::find($info->id)->update($param);
            $param = [
                'break_end' => $now,
            ];
            BreakTimes::find($info->id)->latest('id')->first()->update($param);
            return redirect('/');
        }
    }
}

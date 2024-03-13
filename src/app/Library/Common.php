<?php


namespace app\Library;


use App\Models\Attendance;
use App\Models\BreakTimes;
use Auth;
use Carbon\Carbon;


class Common {

    /** ログイン中のユーザーの今日の勤怠レコードを返す */
    public function Info() {
        $user_id = Auth::user()->id;
        $date = Carbon::now()->format('Y-m-d');
        $info = Attendance::where('user_id', $user_id)->where('date', $date)->first();
        return $info;
    }
    
    /** 引数(int)をdatetime('H:i:s')に変換する */
    public function SecondToTime($diff) {
        $date = Carbon::now()->format('Y-m-d');
        $hours = floor( $diff / 3600 );
        $minutes = floor( ( $diff / 60 ) % 60 );
        $seconds = $diff % 60;
        $time = $date . " " . $hours . ":" . $minutes . ":" . $seconds;
        $formated_time = Carbon::create($time)->format('H:i:s');
        return $formated_time;
    }

    /** 引数str('H:i:s')の差分を秒数(int)で返す
     *  引数が1つの場合、現在時刻との差分を秒数(int)で返す */
    public function TimeDiff($start, $end = null) {
        $date = Carbon::now()->format('Y-m-d');
        $start = $date . ' ' . $start;
        if ($end == null) {
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $diff = Carbon::create($start)->diffInSeconds($now);
        } else {
            $end = $date . ' ' . $end;
            $diff = Carbon::create($start)->diffInSeconds(Carbon::create($end));
        }
        return $diff;
    }

    /** ログイン中のユーザーの今日の休憩時間の合計秒数を計算(int) */
    public function BreakTimesTotal() {
        $info = Common::Info();
        $break_times = BreakTimes::all();
        $break_times_second = 0;
        foreach($break_times as $break_time) {
            if($break_time['attendance_id'] == $info['id']) {
                $diff = Common::TimeDiff($break_time['break_begin'], $break_time['break_end']);
                $break_times_second += $diff;
            }
        }
        return $break_times_second;
    }
}
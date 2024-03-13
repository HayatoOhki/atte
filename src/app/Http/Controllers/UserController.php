<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user() {
        $users = User::paginate(25);
        return view('user', compact('users'));
    }
    public function show($id) {
        $user = User::find($id);
        $attendances = Attendance::where('user_id', '=', $id)->paginate(5);
        return view('show', compact('user', 'attendances'));
    }
}

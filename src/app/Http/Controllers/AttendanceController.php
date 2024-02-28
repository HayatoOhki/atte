<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index() {
        return view('index');
    }
    public function attendance() {
        return view('attendance');
    }
    public function register() {
        return view('auth.register');
    }
    public function login() {
        return view('auth.login');
    }
}

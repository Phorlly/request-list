<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;

class RequestListCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function requestLeave()
    {
        $users = User::all();
        $leaves = Leave::where('is_leave', 1)->get();

        return view("pages.request-leave", compact('users', 'leaves'));
    }

    public function requestMission()
    {
        $users = User::all();
        $leaves = Leave::where('is_leave', 0)->get();

        return view("pages.request-mission", compact('users', 'leaves'));
    }
}

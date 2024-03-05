<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;

class DepartmentCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view("pages.department");
    }

    public function leaveMission()
    {
        return view("pages.leave-mission");
    }

    public function leave()
    {
        $users = User::all();
        $leaves = Leave::where('is_leave', 1)->get();

        return view("pages.leave", compact('users', 'leaves'));
    }

    public function mission()
    {
        $users = User::all();
        $leaves = Leave::where('is_leave', 0)->get();

        return view("pages.mission", compact('users', 'leaves'));
    }
}

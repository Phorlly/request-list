<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\RequestList;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $departments = Department::count();
        $requesters = RequestList::count();
        $pending = RequestList::where('status', 1)->count();
        $approved = RequestList::where('status', 2)->count();
        $rejected = RequestList::where('status', 0)->count();

        return view('home', compact('users', 'departments', 'requesters', 'pending', 'approved', 'rejected'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\Controller;

class UserCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $items = Role::all();

       return view("pages.user", compact('items'));
    }

    public function assign()
    {
        $users = User::all();
        $deparments = Department::all();

       return view("pages.department-user", compact('users','deparments'));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::paginate(10);
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

        return view('admin.dashboard', compact('users', 'months'));
    }

    public function profile(User $user){

        $workhours = $user->workhours()->paginate(10);

        return view('admin.profile', compact('user', 'workhours'));
    }

}

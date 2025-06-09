<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::with('savings')->get(); // kama una relation
        return view('admin.dashboard');
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $plans = Plan::count();
        $users = User::count();

        return view('admin.index', compact('plans','users'));
    }
}

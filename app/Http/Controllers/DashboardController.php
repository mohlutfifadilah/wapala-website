<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        if(!Auth::check())
            return redirect('/login')->with('error', 'Login terlebih dahulu!');
        return view('admin.dashboard');
    }
}
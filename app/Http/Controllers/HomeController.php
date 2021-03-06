<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index(\App\User $user)
    {
		if (\Auth::user()->role == 'ADMIN') {
			$users = DB::table('users')->where('role', '<>', 'ADMIN')->get();
			return view('admin.home', array('users' => $users));
		} else {
			return view('customer.home');
		}
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    
    public function checkUserType(){
        // if (!Auth::user()) {
        //     return ('welcome');
        // } 

        if (Auth::user()->userType === 'ADM') {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->userType === 'USR') {
            return redirect()->route('user.dashboard');
            
        }
    } 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //      return view('home');
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         if (Auth()->user()->is_admin != 1 )
        {
        
            return redirect('/');
        }
        else
        {
            Auth::logout();
            return redirect('login');
        }
        
    }

     public function adminHome()
    {
        if (Auth()->user()->is_admin != 1 )
        {
            Auth::logout();
            return redirect('login');
        }
        else
        {
            return view('admin.home');
        }
        
    }

}
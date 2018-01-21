<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    /**
      * Redirect to dashboard if authenticated
      */
    public function index()
    {
        return view('index');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
    	return view('dashboard');
    }
}

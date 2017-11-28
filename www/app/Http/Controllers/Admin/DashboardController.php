<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{   
    /**
      * Redirect to dashboard if authenticated
      * 
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        return redirect(route('admin.dashboard'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
	public function __construct(){
       
    }

    public function index(Organization $organization) {
    	return view('organizations.index', compact('organization'));
    }

    public function showUsers(Organization $organization){
    	return view('organizations.users', compact('organization'));
    }
}

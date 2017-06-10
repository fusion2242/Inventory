<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    function viewlogin()
    {
    	return view('login');
    }
    
}

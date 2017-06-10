<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    function viewsalesreport()
    {
    	return view('reports.sale');
    }
    function viewsales_summary()
    {
    	return view('reports.salesSummary');
    }
    function viewpurchasereport()
    {
    	return view('reports.purchase');
    }
    function viewstockreport()
    {
    	return view('reports.stock');
    }
}

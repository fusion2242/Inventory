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

    function getSalesReportView()
    {

        $date=date_create($_POST['date_from']);
        $date_from = date_format($date,"Y-m-d");

        $date=date_create($_POST['date_to']);
        $date_to = date_format($date,"Y-m-d");

        $data = DB::table('invoices')
                      ->select('invoices.*','product.product_name','order_items.quantity','order_items.quantity','order_items.unit_price'
                        ,'order_items.total','orders.total as TotalPrice')
                      ->whereBetween('invoices.created', [$date_from, $date_to])
                      ->join('orders','orders.id','=','invoices.order_id')
                      ->join('order_items','order_items.order_id','=','invoices.order_id')
                      ->join('product','product.id','=','order_items.product_id')
                      ->get();

        echo  view('reports.printable.salesreport',['data' => $data, 'from'=>$date_from, 'to'=>$date_to]);
    }

    function getSalesSummaryView()
    {
        $date=date_create($_POST['date_from']);
        $date_from = date_format($date,"Y-m-d");

        $date=date_create($_POST['date_to']);
        $date_to = date_format($date,"Y-m-d");

        $data = DB::table('invoices')
                      ->select('invoices.*','product.product_name','order_items.quantity','order_items.quantity','order_items.unit_price'
                        ,'order_items.total','orders.total as TotalPrice')
                      ->selectRaw('sum(order_items.unit_price) as sellingprice')                      
                      ->whereBetween('invoices.created', [$date_from, $date_to])
                      ->join('orders','orders.id','=','invoices.order_id')
                      ->join('order_items','order_items.order_id','=','invoices.order_id')
                      ->join('product','product.id','=','order_items.product_id')
                      ->get();

        echo view('reports.printable.salessummary',['data' => $data]);
     }

    function getPurchaseReportView()
    {
        $date=date_create($_POST['date_from']);
        $date_from = date_format($date,"Y-m-d");

        $date=date_create($_POST['date_to']);
        $date_to = date_format($date,"Y-m-d");

        $data = DB::table('purchase')
                      ->select('purchase.*','purchased_products.product_code','purchased_products.quantity','purchased_products.unit_price'
                        ,'purchased_products.total','purchase.grand_total','supplier.suppliername')
                      ->join('purchased_products','purchase.id','=','purchased_products.purchase_id')
                      ->join('supplier','supplier.id','=','purchase.supplier_id')
                      ->get();
        echo  view('reports.printable.purchasereport',['data' => $data, 'from'=>$date_from, 'to'=>$date_to]);
     }


}

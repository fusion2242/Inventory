<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DateTime;
class OrderController extends Controller
{
    function viewaddorder()
    {
    	return view('order.add');
    }
    function addMixed(){
        return view('order.add_mix');
    }
    function viewmanageorder()
    {
    	return view('order.manage');
    }
    function viewmanageorderMix()
    {
    	return view('order.manage_mix');
    }
    function viewmanageinvoice()
    {
	return view('order.invoice');
    }
    function getOrderByType(){
       
            $data = DB::table('product')->get();
       
        return response()->json($data);
    }
   function  getPriceByType($id){
     
            $data = DB::table('product')->where('id',$id)->first();
    
        return response()->json($data);
    }
   function  getPriceByMixed($id){
     
            $data = DB::table('mixed_products')->where('id',$id)->first();
    
        return response()->json($data);
    }

    function getEmployees(){
        $data = DB::table('employee')->select('id as value','employee_name as label')->get();
        return response()->json($data);
     
    }
    function addOrder(){
    
           //  $random = mt_rand(0,999999);
            if(isset($_POST['is_commisioned'])){
              $orderId =  DB::table('orders')->insertGetId(['no' => $_POST['orderNo'],'total' => $_POST['grandTotal'], 'is_commisioned' => 1, 'is_mixed' => (isset($_POST['is_mixed'])) ? $_POST['is_mixed'] : NULL, 'employee_id' => $_POST['commTo']['value'],'commission' => $_POST['commAmount'], 'created' => date('Y-m-d')]);
            }else{
                 $orderId =  DB::table('orders')->insertGetId(['no' => $_POST['orderNo'],'total' => $_POST['grandTotal'], 'is_mixed' => (isset($_POST['is_mixed'])) ? $_POST['is_mixed'] : NULL, 'created' => date('Y-m-d')]);
            }
           
       $product = $_POST['productId'];
       foreach($product as $key => $p){
           DB::table('order_items')->insert(['order_id' => $orderId, 'product_id' => $p, 'quantity' => $_POST['quantity'][$key], 'unit_price' => $_POST['unitPrice'][$key], 'total' => $_POST['total'][$key]]);
           $c = DB::table('product')->where('id',$p);
           
           if($c->first()->product_quantity != 0){
                $c->decrement('product_quantity',$_POST['quantity'][$key]);
           }
       
       }
       return response()->json(['success' => 'ok', 'msg' => 'Order Succesfully Added']);
    }

    function getOrders($start,$end){
        $data = DB::table('orders')->select('*','orders.id as orderId','employee.id as employeeId')
        ->leftJoin('employee','orders.employee_id','=','employee.id')
        ->where('orders.created','>=',$start)
        ->where('orders.created','<=',$end)
        ->get();
        return response()->json($data);
    }
    function getOrdersMix($start,$end){
        $data = DB::table('orders')->select('*','orders.id as orderId','employee.id as employeeId')
        ->leftJoin('employee','orders.employee_id','=','employee.id')
        ->where('orders.created','>=',$start)
        ->where('orders.created','<=',$end)
        ->whereNotNull('orders.is_mixed')
        ->get();
        return response()->json($data);
    }

    function getOrderItems($id){
        $data = DB::table('order_items')->select('*','order_items.id as orderitemId','product.id as productId')
        ->join('product','order_items.product_id','=','product.id')
        ->where('order_items.order_id',$id)
        ->get();
        return response()->json($data);
    }
    function getBuyerType($table){
        if($table == '1'){
            $data = DB::table('supplier')->select('id','suppliername as name')->get();
            return response()->json($data);
        }else if($table == '2'){
            $data = DB::table('customer')->select('id','customer_name as name')->get();
            return response()->json($data);
        }
    }
    function generateInvoice(){
        $random = mt_rand(0,999999);
      $id = DB::table('invoices')->insertGetId(['type' => $_POST['type'], 'buyer_id' => $_POST['buyer_id'], 'order_id' =>$_POST['order_id'], 'status' => $_POST['status'],'invoice_no' => $random, 'payment_type' => $_POST['paymentType'], 'created' => $_POST['created']]);
      $response = array('success' => 'ok', 'msg' => 'Invoice Generated', 'id' => $id);
      return response()->json($response);
    }
    function invoice($id){
        return view('invoice.invoice',['id' => $id]);
    }
    function getInvoiceItems($id){
        $buyer = [];
        $invoice = DB::table('invoices')->where('id',$id)->first();
        $order = DB::table('orders')->where('id',$invoice->order_id)->first();
        $products = DB::table('order_items')->where('order_items.order_id',$invoice->order_id)
        ->select('*','order_items.id as orderItemId','product.id as productId')
        ->join('product','order_items.product_id','=','product.id')
        ->get();
        if($invoice->type == '1'){
            $buyer = DB::table('supplier')->where('id',$invoice->buyer_id)->select('suppliername as name')->first();
        }else if($invoice->type = 2){
            $buyer = DB::table('customer')->where('id',$invoice->buyer_id)->select('customer_name as name')->first();
        }
        $response = array('invoice' => $invoice, 'order' => $order, 'products' => $products, 'buyer' => $buyer);
        return response()->json($response);

    }

    function getInvoices($type,$start,$end){
        if($type == '1'){
            $select = DB::table('invoices')
            ->select('*','invoices.id as invoiceId','orders.id as orderId','supplier.id as supplierId','supplier.suppliername as name' ,'invoices.created as invoiceDate','invoices.status as invoiceStatus')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('supplier','invoices.buyer_id','=','supplier.id')
            ->where('invoices.type','1')
            ->where('invoices.created','>=',$start)
            ->where('invoices.created','<=',$end)
            ->get();
        }else if($type == '2'){
            $select = DB::table('invoices')
            ->select('*','invoices.id as invoiceId','orders.id as orderId','customer.id as customerId','customer.customer_name as name','invoices.created as invoiceDate','invoices.status as invoiceStatus')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('customer','invoices.buyer_id','=','customer.id')
            ->where('invoices.type','2')
            ->where('invoices.created','>=',$start)
            ->where('invoices.created','<=',$end)
            ->get();
        }
        
        return response()->json($select);

    }

    function deleteInvoice($id){
        DB::table('invoices')->delete($id);
        return response()->json(['success' => 'ok', 'msg' => 'Invoice removed']);
    }
    function changeInvoiceStatus($id,$status){
        DB::table('invoices')->where('id',$id)->update(['status' => $status]);
    }
    function changeOrderStatus($id,$status){
        DB::table('orders')->where('id',$id)->update(['status' => $status]);
    }
    function deleteOrder($id){
        DB::table('orders')->delete($id);
        DB::table('order_items')->where('order_id',$id)->delete();
        DB::table('invoices')->where('order_id',$id)->delete();
        return response()->json(['success' => 'ok']);
    }
    function getMixedProducts(){
        $data = DB::table('mixed_products')->get();
        return response()->json($data);
    }
}

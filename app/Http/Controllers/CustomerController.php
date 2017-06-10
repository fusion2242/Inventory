<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;



class CustomerController extends Controller
{
    function customer_view()
    {
    	return view('customer.add');
    }
    function add_Customer()
    {
    	$_POST['token'] = $_POST['_token'];
   	DB::table('customer')->insert(
    ['customer_name' => $_POST['name'],'customer_phone' => $_POST['phone'],'customer_email' => $_POST['email'],'date' => $_POST['date'],'customer_address' => $_POST['address'],'customer_id' => $_POST['id'],'comments' => $_POST['comments']]);
     Session::flash('success', 'Customer added successfully');
    	
    }
     function get()
     {

      $customer = DB::table('customer')->get();
       // print_r($customer);
       return view('customer.manage',['cat' => $customer]);
   }
    function update_cust($id)
    {
       $cust = DB::table('customer')->where('id',$id)->get();
       echo json_encode($cust);
    }
    function submit_up_data($id)
    { 

      // unset($_POST['_token']);
    DB::table('customer')
            ->where('id', $id)
            ->update(['customer_id' => $_POST['customer_id'],'customer_name' => $_POST['customer_name'],'customer_email' => $_POST['customer_email'],'customer_phone' => $_POST['customer_phone']]);
            // return view('/customer.manage')

   Session::flash('updated','Customer updated successfully!');


    }
    function deletecust($id)
    {
      DB::table('customer')->delete($id);
      Session::flash('deleted','Customer deleted successfully!');
      return redirect('/customer/manage');
    }

}

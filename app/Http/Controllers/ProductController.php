<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{
    function viewaddproduct()

    {
        $category =  DB::table('product_category')->get();
        $supplier =  DB::table('supplier')->get();
        
        return view('product.add',['cat' => $category,'sup' => $supplier]);
    }
    function viewmanageproduct()
    {
    	return view('product.manage');
    }
    function viewbarcode()
    {
    	return view('product.barcode');
    }
    function viewdamage()
    {
       $product =  DB::table('product')->get();
    	return view('product.damage',['prod' => $product]);
    }
    function getproductcat()
    {
        $cat = DB::table('product_category')->get();
        return response()->json(["data"=>$cat]);
    }
    function viewproductcategory()
    {
         
    	return view('product.category.product');
    }
    function viewproductsubcategory()
    {
    	return view('product.category.sub');
    }
     function getproduct()
    {
       $product =  DB::table('product')->get();
       $category = DB::table('product_category')->get();

       return view('product.manage',['pro' => $product,'cat' => $category]);
     
    }
    function submitpcategory()
    {
        DB::table('product_category')->insert(
        ['category' => $_POST['productcat']]);  
    }
     function add_product()
    { 
         $_POST['_token'] = $_POST['_token'];
        DB::table('product')->insert(
        ['product_code' => $_POST['productcode'],'product_name' => $_POST['product_name'],'product_quantity' => $_POST['product_quantity'],'product_image' => $_POST['product_image'],'date' => $_POST['created_on'],'supplier_id' => $_POST['supplier'],'product_category' => $_POST['product_category'],'buying_price' => $_POST['buying_price'],'selling_price' => $_POST['selling_price']]);  
        Session::flash('success','Product added successfully!');
    }
     function get_cat()
    {
       $cat = DB::table('product_category')->get();
         $supplier =  DB::table('supplier')->get();
        return view('product.add',['cat' => $cat],['sup' => $supplier]);
    }
    function deletecat($id)
    {
        DB::table('product_category')->delete($id);
        }
     function update_pro($id)
    {
       $prop = DB::table('product')->where('id',$id)->first();
        echo json_encode($prop);


    }

    function submitupdatedproduct($id)
    {

         $_POST['token'] = $_POST['_token'];
        DB::table('product')
            ->where('id', $id)
            ->update(['product_code' => $_POST['product_code'],'product_name' => $_POST['product_name'],
                'product_quantity' => $_POST['product_quantity'],'product_category' => $_POST['product_category'],'buying_price' => $_POST['buying_price'],'selling_price' => $_POST['selling_price']]);
          
    Session::flash('updated','Product updated successfully!');
    }


     function deleteproduct($id)
    {
        DB::table('product')->delete($id);
        Session::flash('deleted','Product deleted successfully!');
        return redirect('/product/manage');
    }
    function getProducts(){
        $data = DB::table('product')->get();
        return response()->json($data);
    }
    function addDamageProduct($id,$quantity,$note){
       $product =  DB::table('product')->where('id',$id);
       $product->increment('damage',$quantity);
       $product->decrement('product_quantity', $quantity, ['damage_note' => $note]);
       
       
       $quantityNow = DB::table('product')->where('id',$id)->select('product_quantity','damage')->first();
       return response()->json($quantityNow);
    } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;



class MixingController extends Controller
{
	
function add(){
    	 $products = DB::table('product')->get();
         return view('mixing.add',['pro' => $products]);
    }

    function products(){
        return view('mixing.products');
    }

    function getProducts(){
        $data = DB::table('product')->get();
        return response()->json($data);
    }

    function saveMixedProduct(){
        $id = DB::table('mixed_products')->insertGetid(['product_name' => $_POST['name'] ,'quantity' => $_POST['quantity'], 'selling_price' => $_POST['price'],'created_on' => $_POST['created_on']]);
        $code = $_POST['product_code'];
        foreach($code as $key => $c){
             DB::table('mixed_resources')->insert(['mixed_id' => $id,'product_code' => $c,'quantity' => $_POST['product_quantity'][$key]]);
        }
       
    }
    function getMixedProducts(){
        $data = DB::table('mixed_products')->get();
        return response()->json($data);
    }
    function getMixedProductsResources($id){
        $data = DB::table('mixed_resources')
                                        ->select('*','product.id as pId','mixed_resources.id as mId','mixed_resources.product_code as mpc')
                                        ->join('product','mixed_resources.product_code','=','product.id')
                                        ->where('mixed_resources.mixed_id',$id)
                                        ->get();
        return response()->json($data);
    }

    function delete($id){
        DB::table('mixed_products')->where('id',$id)->delete();
        DB::table('mixed_resources')->where('mixed_id',$id)->delete();
    }
}
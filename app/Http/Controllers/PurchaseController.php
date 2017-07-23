<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;

class PurchaseController extends Controller
{

    function addsupplier()
    {
     $_POST['token'] = $_POST['_token'];
     $numbers = implode(',',$_POST['phone']);
     
    DB::table('supplier')->insert(
    ['companyname' => $_POST['companyname'],'suppliername' => $_POST['suppliername'],'email' => $_POST['email'],'phone' => $numbers,'address' => $_POST['address'],'created_on' => $_POST['created_on'], 'comments' => $_POST['comments']]);
   Session::flash('success', 'Supplier added successfully');
   }
    function viewaddsupplier()
    {
        return view('managepurchase.supplier.add');
    }
    // function viewmanagesupplier()
    // {
    //     return view('managepurchase.supplier.manage');
    // }
    function viewnewpurchases()
    {
        $prod = DB::table('product')->get();
       
        return view('managepurchase.purchase.new');
    }
    function viewpurchasehistory()
    {
        return view('managepurchase.purchase.history');
    }
    function get()
    {
       $supplier =  DB::table('supplier')->orderBy('created_on','desc')->get();
       return view('managepurchase.supplier.manage',['sup' => $supplier]);
     
    }
    function deletesupplier($id)
    {
        DB::table('supplier')->delete($id);
        Session::flash('deleted', 'Supplier deleted successfully!');
        return redirect('/manage-purchase/supplier/manage');
       
    }
     function update_sup($id)
    {
       $supp = DB::table('supplier')->where('id',$id)->first();
       echo json_encode($supp);


    }
    function submitupdatedsupplier($id)
    {
        $_POST['token'] = $_POST['_token'];
        DB::table('supplier')
            ->where('id', $id)
            ->update(['companyname' => $_POST['company_name'],'suppliername' => $_POST['supp_name'],
                'email' => $_POST['supp_email'],'phone' => $_POST['supp_phone'],'address' => $_POST['supp_address']]);
            Session::flash('updated','Supplier udpated successfully!');
    }

    function getAllProducts(){
        
        $products =  DB::table('product')->get();
        return response()->json($products);

    }
    function getAllSupplier(){
        
        $supplier =  DB::table('supplier')->get();
        return response()->json($supplier);

    }
    
    function get_product($id)
    {
           $prod = DB::table('product')->where('supplier_id',$id)->get();
           return response()->json($prod);
    }

    function addNewPurchases(){
        $purchase = ['supplier_id' => $_POST['supplier_id'], 'frieght' => $_POST['frieght'],'reference' => $_POST['reference'], 'grand_total' => $_POST['grand_total'],'created_on' => $_POST['created'],'submitted_by' => '1'];
         $id =  DB::table('purchase')->insertGetId($purchase);

         $purchaseCode = $_POST['product_code'];

         foreach($purchaseCode as $key => $p){
            DB::table('purchased_products')->insert(['purchase_id' => $id, 'product_code' => $p, 'quantity' => $_POST['quantity'][$key], 'unit_price' => $_POST['unit_price'][$key], 'total' => $_POST['total'][$key]]);
            DB::table('product')->where('product_code',$p)->increment('product_quantity', $_POST['quantity'][$key]);
         }
       
    }
    function getPurchaseHistory($from,$to){
        $data = DB::table('purchase')
                    ->where('purchase.created_on','>=',$from)
                    ->where('purchase.created_on','<=',$to)
                    // ->whereBetween('purchase.created_on',[$from,$to])
                    // ->orWhereBetween('purchase.created_on',[$from,$to])
                    ->join('supplier','purchase.supplier_id','=','supplier.id')
                    ->select('*','purchase.id as purchaseId','supplier.id as supplierId','purchase.submitted_by as puchaseSubmittedBy','purchase.created_on as purchaseDate')
                    ->get();

                    return response()->json($data);
    }
    function getPurchaseProducts($id){
        $data = DB::table('purchased_products')
                        ->where('purchase_id',$id)
                        ->get();
                        return response()->json($data);
    }
}

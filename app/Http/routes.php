<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

   Blade::setContentTags('<%', '%>');        // for variables and all things Blade
    Blade::setEscapedContentTags('<%%', '%%>'); 
Route::group(['middleware' => 'web'], function () {
    //
});
Route::get('/login','LoginController@viewlogin');

Route::get('/','DashboardController@index');
Route::get('/mixing/add','mixingController@add');
Route::get('/mixing/products','mixingController@products');
Route::get('/mixing','mixingController@mixing');
Route::get('/mixing/getProducts','mixingController@getProducts');
Route::post('/mixing/saveMixedProduct','mixingController@saveMixedProduct');
Route::get('/mixing/getMixedProducts','mixingController@getMixedProducts');
Route::get('/mixing/getMixedProductsResources/{id}','mixingController@getMixedProductsResources');
Route::get('/mixing/delete/{id}','mixingController@delete');


Route::get('/managepurchase/supplier/update/{id}','PurchaseController@update_sup');
Route::get('/manage-purchase/supplier/manage','PurchaseController@get');
Route::post('/managepurchase/supplier/submitupdate/{id}','PurchaseController@submitupdatedsupplier');
Route::get('/manage-purchase/supplier','PurchaseController@viewaddsupplier');
Route::get('/manage-purchase/purchase','PurchaseController@viewnewpurchases');
Route::get('/manage-purchase/purchase/history','PurchaseController@viewpurchasehistory');
Route::get('/managepurchase/purchase/getProductBySupplier/{id}','PurchaseController@get_product');
Route::post('/managepurchase/purchase/addNewPurchases','PurchaseController@addNewPurchases');
Route::get('/managepurchase/purchase/get_product/{id}','PurchaseController@get_product');
Route::get('/managepurchase/supplier/delete/{id}','PurchaseController@deletesupplier');
Route::get('/managepurchase/purchase/getPurchaseHistory/{from}/{to}','PurchaseController@getPurchaseHistory');
Route::get('/managepurchase/purchase/getPurchaseProducts/{id}','PurchaseController@getPurchaseProducts');



Route::get('/product/manage','ProductController@getproduct');
Route::get('/manageproduct/product/update/{id}','ProductController@update_pro');
Route::post('/manageproduct/product/submitupdate/{id}','ProductController@submitupdatedproduct');
Route::get('/manageproduct/product/delete/{id}','ProductController@deleteproduct');


	
Route::get('/product/barcode','ProductController@viewbarcode');
Route::get('/product/add','ProductController@viewaddproduct');	
Route::get('/product/damage','ProductController@viewdamage');
Route::get('/product/addDamageProduct/{id}/{quantity}/{note}','ProductController@addDamageProduct');
Route::get('/product/category/add','ProductController@viewproductcategory');
Route::get('/product','ProductController@get_cat');
Route::post('/addproduct/','ProductController@add_product');
Route::get('/product/category/addsubcategory','ProductController@viewproductsubcategory');
Route::get('/product/category/getcat','ProductController@getproductcat');
Route::post('/product/category/submit','ProductController@submitpcategory');
Route::get('/product/getProducts','ProductController@getProducts');
Route::get('/productcat/delete/{id}','ProductController@deletecat');


	
Route::get('/order/add','OrderController@viewaddorder');
Route::get('/order/addMixed','OrderController@addMixed');
Route::get('/order/manage','OrderController@viewmanageorder');
Route::get('/order/manageMix','OrderController@viewmanageorderMix');
Route::get('/order/invoice','OrderController@viewmanageinvoice');
Route::get('/order/getOrderByType/','OrderController@getOrderByType');
Route::get('/order/getMixedProducts/','OrderController@getMixedProducts');
Route::get('/order/getPriceByType/{id}','OrderController@getPriceByType');
Route::get('/order/getPriceByMixed/{id}','OrderController@getPriceByMixed');
Route::get('/order/getEmployees','OrderController@getEmployees');
Route::post('/order/addOrder','OrderController@addOrder');
Route::get('/order/getOrders/{start}/{end}','OrderController@getOrders');
Route::get('/order/getOrdersMix/{start}/{end}','OrderController@getOrdersMix');
Route::get('order/getOrderItems/{id}','OrderController@getOrderItems');
Route::get('/order/getBuyerType/{table}','OrderController@getBuyerType');
Route::post('/order/generateInvoice','OrderController@generateInvoice');
Route::get('/order/invoice/{id}','OrderController@invoice');
Route::get('/order/getInvoiceItems/{id}','OrderController@getInvoiceItems');
Route::get('/order/getInvoices/{type}/{start}/{end}','OrderController@getInvoices');
Route::get('/order/deleteInvoice/{id}','OrderController@deleteInvoice');
Route::get('/order/changeInvoiceStatus/{id}/{status}','OrderController@changeInvoiceStatus');
Route::get('/order/changeOrderStatus/{id}/{status}','OrderController@changeOrderStatus');
Route::get('/order/deleteOrder/{id}','OrderController@deleteOrder');

Route::post('/purchase/supplier/submit','PurchaseController@addsupplier');





Route::get('customer/add','CustomerController@Customer_view');
Route::post('/customer','CustomerController@add_Customer');
Route::get('/customer/manage','CustomerController@get');
Route::get('/customer/delete/{id}','CustomerController@deletecust');
Route::get('/customer/update/{id}','CustomerController@update_cust');
Route::post('/customer/updated/{id}','CustomerController@submit_up_data');





Route::get('report/sale','ReportController@viewsalesreport');
Route::get('report/sales_summary','ReportController@viewsales_summary');
Route::get('report/purchase','ReportController@viewpurchasereport');
Route::get('report/stock','ReportController@viewstockreport');
	



Route::get('employee/add','EmployeeController@viewaddemployee');
Route::post('/employee','EmployeeController@add_emp');
Route::get('/employee/manage','EmployeeController@viewmanageemployee');
Route::get('/employee/get','EmployeeController@get_employee');
Route::get('/employee/update/{id}','EmployeeController@update_emp');
Route::post('/employee/updated/{id}','EmployeeController@submit_up_data');
Route::get('/employee/delete/{id}','EmployeeController@deleteemployee');




Route::get('/getAllProducts','PurchaseController@getAllProducts');

Route::get('/getSupplier','PurchaseController@getAllSupplier');



//dummy view to check sales report
Route::get('/dummyview',function(){
   return view('reports.printable.salesreport');
});

Route::post ('/getsalesReport','ReportController@getSalesReportView');
Route::post ('/getSalesSummmary','ReportController@getSalesSummaryView');
Route::post ('/getPurchaseReport','ReportController@getPurchaseReportView');

// Accounts


Route::get('/accounts/getAllParents','AccountsController@getAllParents');
Route::get('/accounts/getAllSub/{id}','AccountsController@getAllSub');
Route::get('/accounts/getAllSeconds','AccountsController@getAllSeconds');
Route::get('/accounts/getAllThird','AccountsController@getAllThird');
Route::get('/accounts/mainHeadsAsSelect','AccountsController@mainHeadsAsSelect');
Route::get('/accounts/getCode/{id}','AccountsController@getCode');
Route::get('/accounts/deleteAccount/{id}','AccountsController@deleteAccount');
Route::get('/accounts/changeAccountStatus/{id}/{status}','AccountsController@changeAccountStatus');
Route::post('/account/saveAccount','AccountsController@saveAccount');

Route::get('/accounts/chatOfAccounts',function(){
return view('accounts.coa');
});
Route::get('/accounts/journalVoucher',function(){
    return view('accounts.voucher');
});
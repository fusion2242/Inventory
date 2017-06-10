<!DOCTYPE html>
<html lang="en" ng-app="invoice" ng-controller="inv" id="invoicePage">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Invoice</title>

    <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="/invoice/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/invoice/style.css"/>
        <link rel="stylesheet" type="text/css" href="/jprint/ngprint.min.css"/>
  </head>
  <body>

<div class="container">
	<div class="row" id="top">
    	<div class="col-md-8">
        	<h3>ORDER INVOICE</h3>
        </div>
        
        <div class="col-md-4 no-print" id="btn">
        	<div class="btn-group">
           	<button type="button" ng-print print-element-id="invoicePage" class="btn btn-default">Print</button>
            <button type="button" class="btn btn-default">PDF</button>
            <button type="button" class="btn btn-default">Email to Customer</button>
            <input type="hidden" value="<?php echo $id ?>" id="id">
            </div>
        </div>
    </div>

</div>

		<br>

<div class="container">
	<div class="row" id="mid">
    	<div class="col-md-1">
        </div>
        
    	<div class="col-md-5">
        	<img src="/invoice/codes_lab.gif" alt="img" class="img-responsive"/>
        </div>
        
        <div class="col-md-6">
        	<h2>INVOICE {{invoice.invoice_no}}</h2>
            <p>Invoice Date: {{invoice.created}} <br> Payment Method: {{invoice.payment_type == '1' ? 'Cash' : 'Bank'}}</p>
        </div>
    </div>
</div>
    		<hr>

<div class="container">
	<div class="row">
    	<div class="col-md-1">
        	
        </div>
        
        <div class="col-md-11">
        	<div id="client">
            	<p>CUSTOMER BILLING INFO: <br> {{buyer.name}}</p>
            </div>
        </div>
    </div>
</div>

		<br>

<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<table class="table">
            	 <thead>
                    <tr>
                        <th class="no">#</th>
                     		<td class="desc">DESCRIPTION</td>
                        	<td class="until">UNIT PRICE</td>
                        	<td class="qty">QUANTITY</td>
                    		<td class="total">TOTAL</td>
                    </tr>
                 </thead>
                 
                 <tbody>
                   <tr ng-repeat="(x,v) in products track by $index" class="jprint">
                              <th>{{$index + 1}}</th>
                        	<td class="desc">{{v.product_name}}</td>
                        	<td class="until">{{v.unit_price}}</td>
                        	<td class="qty">{{v.quantity}}</td>
                        	<td class="total">{{v.total}}</td>
                    </tr>
                 </tbody>
                 
                 <tfoot>
                 	<tr>
                    	<td colspan="3"></td>
                        <td colspan="1">SUBTOTAL</td>
                        <td>{{order.total}}</td>
                    </tr>
                    
                    <tr>
                    	<td colspan="3"></td>
                        <td colspan="1">Tax</td>
                        <td>---</td>
                    </tr>
                    
                    <tr>
                    	<td colspan="3"></td>
                        <th colspan="1">GRAND TOTAL</td>
                        <th>{{order.total}}</td>
                    </tr>
                 </tfoot>

                
            </table>
        </div>
    </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/invoice/js/bootstrap.min.js"></script>
    
    <script src="/angular/angular.js"></script>
    <script src="/jprint/ngprint.min.js"></script>
    </script>
        <script src="/controllers/invoice.js"></script>
  </body>
</html>
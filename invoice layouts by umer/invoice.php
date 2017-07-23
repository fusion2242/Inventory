<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Invoice</title>

    <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>

<div class="container">
	<div class="row" id="top">
    	<div class="col-md-8">
        	<h3>ORDER INVOICE</h3>
        </div>
        
        <div class="col-md-4" id="btn">
        	<div class="btn-group">
           	<button type="button" class="btn btn-default">Print</button>
            <button type="button" class="btn btn-default">PDF</button>
            <button type="button" class="btn btn-default">Email to Customer</button>
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
        	<img src="codes_lab.gif" alt="img" class="img-responsive"/>
        </div>
        
        <div class="col-md-6">
        	<h2>INVOICE 1008</h2>
            <p>Invoice Date: 12 Jul 2016 <br> Payment Method: Cash</p>
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
            	<p>CUSTOMER BILLING INFO: <br> walking Client</p>
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
                    <tr>
                        <th class="no">1</th>
                        	<td class="desc">Apple MacBook Pro MD101LL-Intel Core i5</td>
                        	<td class="until">6,500.00</td>
                        	<td class="qty">10</td>
                        	<td class="total">65,000.00</td>
                    </tr>
                    
                    <tr>
                        <th class="no">2</th>
                        	<td class="desc">Apple MacBook Pro MD101LL-Intel Core i5</td>
                        	<td class="until">6,500.00</td>
                        	<td class="qty">10</td>
                        	<td class="total">65,000.00</td>
                    </tr>
                    
                    <tr>
                        <th class="no">3</th>
                        <td class="desc">Apple MacBook Pro MD101LL-Intel Core i5</td>
                        <td class="until">6,500.00</td>
                        <td class="qty">10</td>
                        <td class="total">65,000.00</td>
                    </tr>
                    
                    <tr>
                        <th class="no">4</th>
                        <td class="desc">Apple MacBook Pro MD101LL-Intel Core i5</td>
                        <td class="until">6,500.00</td>
                        <td class="qty">10</td>
                        <td class="total">65,000.00</td>
                    </tr>
                    
                    <tr>
                        <th class="no">5</th>
                        <td class="desc">Apple MacBook Pro MD101LL-Intel Core i5</td>
                        <td class="until">6,500.00</td>
                        <td class="qty">10</td>
                        <td class="total">65,000.00</td>
                    </tr>
                 </tbody>
                 
                 <tfoot>
                 	<tr>
                    	<td colspan="3"></td>
                        <td colspan="1">SUBTOTAL</td>
                        <td>87,290.00</td>
                    </tr>
                    
                    <tr>
                    	<td colspan="3"></td>
                        <td colspan="1">Tax</td>
                        <td>5,178.00</td>
                    </tr>
                    
                    <tr>
                    	<td colspan="3"></td>
                        <th colspan="1">GRAND TOTAL</td>
                        <th>$ 92,468.00</td>
                    </tr>
                 </tfoot>

                
            </table>
        </div>
    </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
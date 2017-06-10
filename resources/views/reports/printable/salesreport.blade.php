<!DOCTYPE html>
<html ng-app="inventory">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Inventory</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
      
<div id="printableArea">

<div class="row ">
<div class="col-md-8 col-md-offset-2">

<header class="clearfix">
<div class="pull-right" id="logo">
<h1>Fusion<b>INV</b></h1>
</div>
<div id="company">
<h2 class="">Demo Company</h2>
<div>+923472729946</div>
<div>info@fustech.net</div>
</div>

</header>
<hr/>

<main class="invoice_report">

<h4>Sales Report from: <strong><?php echo $from; ?></strong> to <strong><?php echo $to; ?></strong></h4>
<br/>
<br/>

<table class="table" >
<thead>
<tr style="background-color: #ECECEC">
<th class="">#</th>
<th class="">Description</th>
<th class="">Qty</th>
<th class="">Unit Price</th>
<th class="">TOTAL</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$total = 0;
foreach ($data as $value) : ?>
<tr>
<td class=""><?php echo $value->invoice_no ?></td>
<td class=""><?php echo $value->product_name ?></td>
<td class=""><?php echo $value->quantity ?></td>
<td class=""><?php echo $value->unit_price ?></td>
<td class=""><?php echo $value->quantity * $value->unit_price  ?> PKR</td>
</tr>
<?php $total = $value->TotalPrice;
endforeach ?>
</tbody>
<tfoot>
<tr>
<td></td>
<td></td>
<td></td>
<td><h4 class="pull-right">Grand Total: </h4></td>
<td><h4><?php echo $total; ?> PKR</h4></td>
</tr>
</tfoot>

</table>

</main>
<hr/>
<footer class="text-center">
<strong>Fusion Technologies</strong>&nbsp;&nbsp;&nbsp;F7 Mukhtar Center Bait-ul-muqaram Gulshan Iqbal block 11, Karachi</footer>


</div>
</div>

</div>
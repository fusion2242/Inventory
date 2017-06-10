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
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales Summery Report</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sno</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Selling Cost</th>
                  <th>Grand Total</th>
                </tr>

            <?php $i=1; foreach ($data as  $value) : ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $value->invoice_no; ?></td>
                  <td><?php echo $value->created; ?></td>
                  <td><?php echo $value->sellingprice; ?></td>
                  <td><?php echo $value->TotalPrice; ?></td>
                </tr>

            <?php endforeach ?>
           
              </table>
            </div>
</div>
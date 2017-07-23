<!DOCTYPE html>
<html ng-app="purchaseHistory" ng-controller="purchaseCtrl">
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
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="/plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

      <!--Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="/bower_components/angular-block-ui/dist/angular-block-ui.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   </head>
   @include('header')
   @include('nav')
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Purchase History
            <small>manage purchases</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">Manage Purchases</li>
            <li class="active">Purchase</li>
            <li class="active">Purchase History</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Date Range to check Purchase History</h3>

              <div class="box-tools">
                  <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Select Date Range
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" block-ui="myBlockUI">
                <tr>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Grand Total</th>
                  <th>Status</th>
                  <th>Reference</th>
                </tr>
                <tr ng-repeat="(x,v) in history track by $index" ng-click="getProducts(v.purchaseId)">
                  <td>{{v.purchaseDate}}</td>
                  <td>{{v.suppliername}}</td>
                  <td>{{v.grand_total}}</td>
                  <td><span class="label {{v.status ? 'label-info' : 'label-success'}}">{{v.status ? 'completed' : 'pending'}}</span></td>
                  <td>{{v.reference}}</td>
               </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   @include('footer')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" block-ui="myModalBlock">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product Detail</h4>
      </div>
      <div class="modal-body">
      <table class="table table-hover" block-ui="myBlockUI">
                <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total</th>
                
                </tr>
                <tr ng-repeat="(x,v) in products track by $index">
                  <td>{{v.product_code}}</td>
                  <td>{{v.quantity}}</td>
                  <td>{{v.unit_price}}</td>
                  <td>{{v.total}}</td>
                
               </tr>
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
   <!-- /.control-sidebar -->
   
   <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <!-- DataTables -->
   <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
   <!-- SlimScroll -->
   <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- FastClick -->
   <script src="/plugins/fastclick/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="/dist/js/app.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="/dist/js/demo.js"></script>
   <script src="/plugins/daterangepicker/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
   <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/angular/angular.js"></script>
      <script src="/controllers/purchaseHistory.js"></script>
      <script src="/bower_components/angular-block-ui/dist/angular-block-ui.js"></script>
   <!-- page script -->
   <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
       
      });
   </script>
   </body>
</html>
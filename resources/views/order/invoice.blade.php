<!DOCTYPE html>
<html ng-app="mInvoice" ng-controller="invoice">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inventry | Dashboard</title>
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
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="/angular/angular.js"></script>
        <script src="/controllers/manageInvoice.js"></script>
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Manage Invoice
            <small>Order</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Order</li>
            <li class="active">Manage Invoice</li>
         </ol>
      </section>
      <!-- Main content -->
      
      <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Options</h3>

              <div class="box-tools">
                
            
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <div class="col-md-6">
            
              <select ng-model="buyerType" class="form-control" name="" id="">
              <option value="">Select Buyer Type</option>
              <option value="1">Supplier</option>
              <option value="2">Customer</option>
              </select>
              </div>
              </div>
              <div class="col-md-6">
              
              <button type="button" class="btn btn-default pull-right form-control" style="margin-top: -15px;" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Select Date Range
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button> 
              </div>
            </div>
            <!-- /.box-body -->
         </div>
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Date Range to check Order Invoice</h3>

              <div class="box-tools">
                
                  <div class="input-group">
                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Invoice No.</th>
                        <th>Order No.</th>
                        <th>Invoice Date</th>
                        <th>Customer</th>
                        <th>Payment Method</th>
                        <th>Order Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-repeat="(x,v) in invoices track by $index">
                        <td>INV-0089</td>
                        <td>{{v.no}}</td>
                        <td>{{v.invoiceDate}}</td>
                        <td>{{v.name}}</td>
                        <td>cash</td>
                        <td>{{v.total}}</td>
                        <td><label class="label pull-center bg-{{v.invoiceStatus == '1' ? 'green' : 'red'}}">{{v.invoiceStatus == '1' ? 'Paid' : 'Un Paid'}}</label> </td>
                        <td>
                           <div class="btn-group">
                              <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="/order/invoice/{{v.invoiceId}}">View</a></li>
                                 <li ng-click="removeInvoice(v.invoiceId,$index)"><a>Remove</a></li>
                                 <li ng-click="changeStatus(v.invoiceId,v.invoiceStatus,$index)"><a>Change Status</a></li>
                              </ul>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   @include('footer')
   <!-- Control Sidebar -->
   
   <!-- /.control-sidebar -->
   <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
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
    <script src="/plugins/daterangepicker/moment.min.js"></script>
   <script src="/plugins/daterangepicker/daterangepicker.js"></script>
   <script src="/plugins/fastclick/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="/dist/js/app.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="/dist/js/demo.js"></script>
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
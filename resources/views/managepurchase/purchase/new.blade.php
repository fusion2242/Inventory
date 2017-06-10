<!DOCTYPE html>
<html ng-app="newPurchase" ng-controller="products" ng-cloak>
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
      <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
      <script src="/angular/angular.js"></script>
      <script src="/controllers/newPurchaseCtrl.js"></script>
      <link rel="stylesheet" href="/plugins/select2/select2.min.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            New Purchases
            <small>manage purchases</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">Manage Purchases</li>
            <li class="active">Purchase</li>
           
            <li class="active">New Purchases</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content col-md-6">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Select Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
            <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <label class=" control-label">Supplier</label>
          <select class="form-control" ng-model="selectedName" ng-change="getProductsBySupplier(selectedName)" ng-options="item.id as item.suppliername for item in names track by item.id">
                              </select>
                           </div>
                              </div>
                        <br>
               <table class="table table-bordered table-striped tableOrder">
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Purchase</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-repeat="(x, p) in products track by $index">
                        <td width="10%" class="counter">{{x+1}}</td>
                        <td width="35%">{{p.product_code}}</td>
                        <td width="15%">{{p.product_name}}</td>
                        <td width="20%">{{p.product_quantity}}</td>
                        <td><a ng-click="addToCart(p.id, p)">
                           <i class="fa fa-shopping-cart"></i>  
                           </a>                             
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
                           


                          
            
            <!-- /.box-body -->
         </div>
      </section>
      <section class="content col-md-6">
            <!-- /.box-header -->
            <div class="box">
            <div class="box-header">
            <h3 class="box-title">Purchase Order</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
            <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Date</label>
                                 <div class="input-group date">
                                    <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" ng-model="cDate"  class="form-control  created_on"  id="datepicker">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
            <table class="table table-bordered table-striped tableOrder">
            <thead>
            <tr>
            <th>S.No</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="(x, p) in selectedProducts track by $index">
            <td width="10%" class="counter">{{x+1}}</td>
            <td ng-bind="selectedprod[$index] = p.product_name" width="35%">{{p.product_name}}</td>
            <td width="15%"><input type="text" ng-model="quantity[$index]" ng-change="addQuantity($index)"  style="width: 80%;"></td>
            <td width="50%" ng-init="price[$index] = p.buying_price "><input type="text" style="width: 100%;" ng-model="price[$index]" ng-change="addPrice($index)" ng-value="p.buying_price"></td>
            <td><input type="text" class="total" ng-bind="total[$index] = getTotal($index)"  ng-value="getTotal($index)" readonly/></td>
            <td> 
           
            <a ng-click="removePoRow($index)">
            <i class="glyphicon glyphicon-trash"></i>  
            </a>                             
            </td>
            </tr>
            </tbody>
            </table>
            <div  style="float:right;">
            <div class="form-group">
            <label class="control-label">Frieght Cost</label>
            <input  ng-model="frieght" ng-change="addFrieght()"  class="form-control" type="text">
            </div>
            <div class="form-group">
            <label class="control-label">Grand Total</label>
            <input readonly="" ng-model="grandtotal"  class="form-control" type="text">
            </div>
            <div class="form-group">
            <label class="col-sm-5 control-label">Purchase Reference</label>
            <input  class="form-control unite" ng-model="reference" type="text">
            </div>
            <div class="form-group">
            <button class="btn btn-info" ng-click="savePurchases()">Save</button>
            </div>
            </div>
            </div>
            <!-- /.box-body -->
            </div>
      </section>
      <!-- /.content -->    <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @include('footer')
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
      <li>
      <a href="javascript:void(0)">
      <i class="menu-icon fa fa-birthday-cake bg-red"></i>
      <div class="menu-info">
      <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
      <p>Will be 23 on April 24th</p>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <i class="menu-icon fa fa-user bg-yellow"></i>
      <div class="menu-info">
      <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
      <p>New phone +1(800)555-1234</p>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
      <div class="menu-info">
      <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
      <p>nora@example.com</p>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <i class="menu-icon fa fa-file-code-o bg-green"></i>
      <div class="menu-info">
      <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
      <p>Execution time 5 seconds</p>
      </div>
      </a>
      </li>
      </ul>
      <!-- /.control-sidebar-menu -->
      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
      <li>
      <a href="javascript:void(0)">
      <h4 class="control-sidebar-subheading">
      Custom Template Design
      <span class="label label-danger pull-right">70%</span>
      </h4>
      <div class="progress progress-xxs">
      <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <h4 class="control-sidebar-subheading">
      Update Resume
      <span class="label label-success pull-right">95%</span>
      </h4>
      <div class="progress progress-xxs">
      <div class="progress-bar progress-bar-success" style="width: 95%"></div>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <h4 class="control-sidebar-subheading">
      Laravel Integration
      <span class="label label-warning pull-right">50%</span>
      </h4>
      <div class="progress progress-xxs">
      <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
      </div>
      </a>
      </li>
      <li>
      <a href="javascript:void(0)">
      <h4 class="control-sidebar-subheading">
      Back End Framework
      <span class="label label-primary pull-right">68%</span>
      </h4>
      <div class="progress progress-xxs">
      <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
      </div>
      </a>
      </li>
      </ul>
      <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
      <h3 class="control-sidebar-heading">General Settings</h3>
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Report panel usage
      <input type="checkbox" class="pull-right" checked>
      </label>
      <p>
      Some information about this general settings option
      </p>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Allow mail redirect
      <input type="checkbox" class="pull-right" checked>
      </label>
      <p>
      Other sets of options are available
      </p>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Expose author name in posts
      <input type="checkbox" class="pull-right" checked>
      </label>
      <p>
      Allow the user to show his name in blog posts
      </p>
      </div>
      <!-- /.form-group -->
      <h3 class="control-sidebar-heading">Chat Settings</h3>
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Show me as online
      <input type="checkbox" class="pull-right" checked>
      </label>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Turn off notifications
      <input type="checkbox" class="pull-right">
      </label>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
      <label class="control-sidebar-subheading">
      Delete chat history
      <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
      </label>
      </div>
      <!-- /.form-group -->
      </form>
      </div>
      <!-- /.tab-pane -->
      </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
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
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <!-- Select2 -->
   <script src="/plugins/select2/select2.full.min.js"></script>
   <!-- InputMask -->
   <script src="/plugins/input-mask/jquery.inputmask.js"></script>
   <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
   <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
   <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
   <!-- date-range-picker -->
  
   <!-- bootstrap datepicker -->
   <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
   <!-- bootstrap color picker -->
  
   <!-- SlimScroll 1.3.0 -->
   <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- iCheck 1.0.1 -->
  
   
   <!-- FastClick -->
   <script src="/plugins/fastclick/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="/dist/js/app.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="/dist/js/demo.js"></script>
   <!-- Page script -->
   <script>
      $(function () {
        //Initialize Select2 Elements
       
        
       
        
        //Date picker
        $('#datepicker').datepicker({
           format: 'yyyy-mm-dd'
        });
      
       
      });
   </script>

  
   </body>
</html>

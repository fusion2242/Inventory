<!DOCTYPE html>
<html ng-app="manage" ng-controller="manageOrder">
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
 <script src="/angular/angular.js"></script>
        <script src="/controllers/manageOrder.js"></script>
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
        Manage Order
        <small>Order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Order</li>
        <li class="active">Manage Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
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
            
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order No.</th>
                  <th>Order Date</th>
                  <th>Order Status</th>
                  <th>Order Total Price</th>
                  <th>Sales By</th>
                  <th>Gen. Invoice</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="(x,v) in orders track by $index">
                  <td>{{v.no}}</td>
                  <td>{{v.created}}</td>
                  <td><span class="label label-{{v.status == '0'? 'danger' : 'success'}}">{{v.status == '0'? 'Pending' : 'Confirmed'}}</span></td>
                  <td>{{v.total}}</td>
                  <td>{{getEmployee(v.employee_id,$index)}}</td>
                  <td><button class="btn btn-info" ng-click="invoiceModal(v.orderId)">Generate</button></td>
                  <td>
                    <a href="#">
                          
                           <a ng-click="showItems(v.orderId)" alt="Click to see items">
                           <i class="glyphicon glyphicon-eye-open" style="color:Dimgray;"></i>  
                           </a> 
                           &nbsp
                           &nbsp
                           <a ng-click="deleteOrder(v.orderId,$index)">
                           <i class="glyphicon glyphicon-trash" style="color:Dimgray;"></i>  
                           </a> 
                           &nbsp
                           &nbsp
                           <a ng-click="changeStatus(v.orderId,v.status,$index)">
                           <i class="{{v.status == '0'? 'glyphicon glyphicon-triangle-right' : 'glyphicon glyphicon-triangle-left'}}" style="color:Dimgray;"></i>  
                           </a> 
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
    <!-- Modal Start -->
                    <div class="modal fade" id="orderItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ordered Items</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <table class="table">
                          <thead>
                          <tr>
                          <th style="width: 70px;">Name</th>
                          <th style="width: 10px;">Order Quantity</th>
                          <th style="width: 10px;">Total Amount</th>
                          <th style="width: 10px;">Remaining Stock</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr ng-repeat="(x,v) in orderItems">
                          <td>{{v.product_name}}</td>
                          <td>{{v.quantity}}</td>
                          <td>{{v.total}}</td>
                          <td>{{v.product_quantity}}</td>
                          </tr>
                          </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                          
                        </div>
                        </div>
                    </div>
                    </div>
                 <!-- Modal End -->
                  <!-- Modal Start -->
                    <div class="modal fade" id="invoice-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Generate Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
                        <div class="row">
                        <div class="col-md-12">
                        <label for="Type">Type of Customer</label>
                        <select ng-model="buyertype" class="form-control" id="Type" ng-change="getTypes()">
                        <option value="1">Supplier</option>
                        <option value="2">Customer</option>
                        </select>
                        </div>
                        <div class="col-md-6" ng-hide="customers.length == 0">
                        <label for="Type">Select Customer</label>
                        <select ng-model="buyerId" class="form-control"   ng-options="v.id as v.name for v in customers"></select>
                        </div>
                          <div class="col-md-6" ng-hide="customers.length == 0">
                        <label for="Type">Payment Type</label>
                        <select ng-model="paymentType" class="form-control">
                        <option value="1">Cash</option>
                        <option value="2">Bank</option>
                        </select>
                        </div>
                        <div class="col-md-6" ng-hide="customers.length == 0">
                        <label for="">Status</label>
                        <select ng-model="iStatus" class="form-control" id="">
                        <option value="1">Paid</option>
                        <option value="2">Un Paid</option>
                        </select>
                        </div>
                         <div class="col-md-6" ng-hide="customers.length == 0">
                        <label for="">Date</label>
                       <input type="text" ng-model="iDate" class="form-control" id="datepicker">
                        </div>
                        <div class="col-md-12" ng-hide="progress == false">
                         <label for="">  </label>
                       <!-- <div class="progress">
                          <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{progressRate}}%">
                            <span class="sr-only">40% Complete (success)</span>
                          </div>
                        </div>-->
                        <p class="alert alert-success">{{successMsg}} .. To see the invoice <a target="_blank" href="/order/invoice/{{returnedId}}">Click Here</a></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-info" ng-click="generateInvoice()">Generate</button>
                          
                        </div>
                        </div>
                    </div>
                    </div>
                 <!-- Modal End -->
  <!-- /.content-wrapper -->
  @include('footer')

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
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
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
  <script src="/plugins/daterangepicker/moment.min.js"></script>
   <script src="/plugins/daterangepicker/daterangepicker.js"></script>
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
     $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  });
</script>
</body>
</html>

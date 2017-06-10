<!DOCTYPE html>
<html ng-app="addOrder" ng-controller="add">
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
      <!-- DataTables -->
      <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="/plugins/select2/select2.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
       <script src="/angular/angular.js"></script>
        <script src="/controllers/addOrder.js"></script>
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
            Add Order
            <small>Order</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Order</li>
            <li class="active">Add Order</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content col-md-8">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Select Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped tableOrder">
                  <thead>
                     <tr>
                        <th class="col-md-1">S.No</th>
                       
                        <th class="col-md-4">Product</th>
                        <th class="col-md-1">Quantity</th>
                        <th class="col-md-1">Unit Price</th>
                        <th class="col-md-1">Total</th>
                        <th class="col-md-1">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr id="productSelect" ng-repeat="(x,v) in fields track by $index">
                        <td style="width: 10%" class="counter">{{$index+1}}</td>
                        
                        <td style="width: 10%">
                           <select ng-model="product[$index]" ng-change="getPrice($index)" ng-options="p.id as p.product_name for p in products" class="form-control select2">
                              
                           </select>
                        </td>
                        <td style="width: 10%"><input ng-model="quantity[$index]"  ng-change="checkQuantity($index)" style="width: 100%" type="text" name="quantity"></td>
                        <td style="width: 10%"> <input ng-model="unitPrice[$index]" style="width: 100%" type="text"></td>
                        <td style="width: 10%" ng-bind="total[$index] = getTotal($index)">{{getTotal($index)}}</td>
                        <td style="width: 10%">
                           <a ng-click="addField()" class="addProductRow">
                           <i class="glyphicon glyphicon-plus"></i>  
                           </a> 
                           <a ng-click="removeFields($index)" ng-hide="$first">
                           <i class="glyphicon glyphicon-remove"></i>  
                           </a>                             
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
      </section>
      <section class="content col-md-4">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Order Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-background">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="col-sm-5 control-label">Order No.</label>
                           <div class="col-sm-7">
                              <input  ng-model="orderNo" readonly class="form-control " type="text">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
                  <div class="box-background" id="order">
                     <div class="box-body" style="border-top: 0px solid rgb(204, 204, 204);">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-sm-5 control-label">Sub Total</label>
                                 <div class="col-sm-7">
                                    <input readonly ng-model="subTotal" class="form-control unite" type="text">
                                 </div>
                              </div>
                              <br>
                              <br>
                              <div class="form-group">
                                 <label class="col-sm-5 control-label">Sale Commission</label>
                                 <div class="col-sm-7">
                                    <button ng-click="openModal()" class="btn btn-info">Click to add commision</button>
                                 </div>
                              </div>
                              <div class="col-md-12" style="margin-bottom: 5px"></div>
                           </div>
                        </div>
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <div class="box-body" style="border-top: 0px solid rgb(204, 204, 204);">
                     <div class="row">
                     <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-sm-5 control-label" style="padding-top: 16px; font-size: 13px">Commission To:</label>
                              <div class="col-sm-7">
                                 <h4>{{employee.label}}</h4>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-sm-5 control-label" style="padding-top: 16px; font-size: 13px">Commission :</label>
                              <div class="col-sm-7">
                                 <h4>{{comission}}</h4>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-sm-5 control-label" style="padding-top: 11px; font-size: 13px">Grand Total :</label>
                              <div class="col-sm-7">
                                 <h4>{{subTotal}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="box-body" style="border-top: 0px solid rgb(204, 204, 204);">
                     <div class="row">
                        <div class="col-md-12">
                           <button ng-click="submitOrder()" id="btn_order" class="btn bg-navy btn-block btn-flat ">Submit Order
                           </button>
                        </div>
                     </div>
                  </div>
                  <!-- hidden field -->
                 <!-- Modal Start -->
                    <div class="modal fade" id="commisonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Commission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="row">
                           <div class="form-group">
                           <div class="col-md-6">
                           <label for="employee">Select Employee</label>
                           <select  id="employee" ng-model="employee" class="form-control" ng-options="e as e.label for e in employees"></select>
                           </div>
                           
                           <div class="col-md-6">
                           <label for="amountCom">Commission Amount</label>
                           <input type="text" ng-model="comission" placeholder="Amount" class="form-control" id="amountCom">
                           </div>
                           </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" ng-click="add()" class="btn btn-primary">Add</button>
                        </div>
                        </div>
                    </div>
                    </div>
                 <!-- Modal End -->
               
            </div>
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
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <script src="/plugins/select2/select2.full.min.js"></script>
   <!-- DataTables -->
   <!-- <script src="/plugins/datatables/jquery.dataTables.min.js"></script> -->
   <!-- <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
   <!-- SlimScroll -->
   <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- FastClick -->
   <script src="/plugins/fastclick/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="/dist/js/app.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="/dist/js/demo.js"></script>
   <!-- page script -->
   <script>
      $(document).ready(function() {
      
          $('.box-body').css({"border-top":"0px solid #ccc"});
      
         
      
      });
      
   </script>
   
   </body>
</html>
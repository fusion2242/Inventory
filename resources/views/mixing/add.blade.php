<!DOCTYPE html>
<html ng-app="mixingProduct" ng-controller="mixingCtrl">
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
      <!-- DataTables -->
      <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="/plugins/select2/select2.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
       <script src="/angular/angular.js"></script>
      <script src="/controllers/mixingProduct.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Mixing
            <small>Add Order</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/mixing"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Mixing</li>
            <li class="active">add </li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content col-md-8">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Select Mix Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped tableOrder">
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <!--                   <th>Unit Price</th>
                           <th>Total</th> -->
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr ng-repeat="(x,v) in productsFields track by $index">
                        <td width="10%" class="counter">{{$index+1}}</td>
                        <td width="45%">
                            <select id="{{v.id}}"  class="form-control" ng-model="productCode[$index]" ng-options="item.id as item.product_name for item in products">
            
                            </select>
                        </td>
                        <td width="15%"><input type="text" width="15px;" ng-model="quantity[$index]">
                        
                        </td>
                        
                        <td width="15%">
                           <a ng-click="addProduct()">
                           <i class="glyphicon glyphicon-plus"></i>  
                           </a> 
                           <a ng-click="removeProduct($index,productCode[$index],quantity[$index])">
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
               <h3 class="box-title">Mix Product Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-background">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="col-sm-5 control-label">Mix product name</label>
                           <div class="col-sm-7">
                              <input ng-model="name"  class="form-control " type="text">
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
                                 <label class="col-sm-5 control-label">Total Quantity</label>
                                 <div class="col-sm-7">
                                    <input ng-model="quantityTotal"  class="form-control unite" type="text">
                                 </div>
                              </div>
                              <br>
                              <br>
                              <div class="form-group">
                                 <label class="col-sm-5 control-label">Price</label>
                                 <div class="col-sm-7">
                                    <input ng-model="price"  class="form-control unite" type="text">
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
                           <button ng-click="saveMixed()" id="btn_order" class="btn bg-navy btn-block btn-flat ">Submit
                           </button>
                        </div>
                     </div>
                  </div>
                 
            
            </div>
         </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   @include('footer')
   </div>
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <script src="/plugins/select2/select2.full.min.js"></script>

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
   <script>
      //  $(function () {
      // $(".select2").select2();
      //    $("#example1").DataTables();
      //    $('#example2').DataTables({
      //      "paging": true,
      //      "lengthChange": false,
      //      "searching": false,
      //      "ordering": true,  
      //      "info": true,
      //      "autoWidth": false
      //    });
      //  });
     
   </script>
   </body>
</html>
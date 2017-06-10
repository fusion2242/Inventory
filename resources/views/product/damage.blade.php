<!DOCTYPE html>
<html ng-app="damage" ng-controller="dmg">
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
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="/angular/angular.js"></script>
        <script src="/controllers/damageProducts.js"></script>
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Damage Product
            <small>Damage Product</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Product</li>
          
            <li class="active">Damage Products</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
         <?php if(Session::has('success')):?>
         <div class="alert alert-success alert-dismissible alertdiv">
            <button type="button" class="close closeBtn" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo session('success')?> 
         </div>
         <?php endif?>
         <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
               <table  class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>SI</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Damage Quantity</th>
                        <th>Note</th>
                        <th>Submit</th>
                     </tr>
                  </thead>
                  <tbody>
                   
                     <tr ng-repeat="(x,v) in products track by $index">
                        <td>{{$index + 1}}</td>
                        <td>{{v.product_code}}</td>
                        <td>{{v.product_name}}</td>
                        <td ng-bind="rQuantity[$index] = v.product_quantity"></td>
                        <td><input type="number"   ng-init="damageQ[$index] = v.damage" ng-model="damageQ[$index]" class="form-control" placeholder="Enter Damage Quantity">
                        </td>
                        <td><input type="text"  ng-init="damageNote[$index] = v.damage_note" ng-model="damageNote[$index]" name="note"  class="form-control" placeholder="Enter Damage Note"></td>
                        <td> 
                           <a ng-click="addDamage($index,v.id)">
                           <i class="glyphicon glyphicon-ok"  ></i>  
                           </a>
                        </td>
                          
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
   <!-- Control Sidebar -->
   <!-- /.control-sidebar -->
   <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
   </div>
  <!--  -->
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
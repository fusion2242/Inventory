<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inventory </title>
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
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Product Category
            <small>supplier</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Product</li>
            <li class="active">Category</li>
            <li class="active">Product Category</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Add Category</h3>
               <br>
               <br>
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                        <label>Product Category</label>
                        <input type="text" class="form-control" id="productcat" placeholder="Add Category">
                        <br>
                        <button type="submit"  class="btn btn-primary pull-right submitBtn">Submit</button>
                     </div>
                     <div class="col-md-4">
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-footer">
               <div class="box">
                  <div class="box-header">
                     <h3 class="box-title">Data Table With Full Features</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Rendering engine</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
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
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <!-- DataTables -->
   <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript">
      var oTable;
      $(document).ready(function()
      {
        oTable = $('#mytable').DataTable({
          "ajax": {
            "url" : '/product/category/getcat',
            "type" : "get",
            "dataType" : "json"
          },
          "columns": [
          { "data" : "category" },
          {
            "data": "id","render":function(data){
              return '<button data-id="' + data + '"class="btn btn-primary myBtn">Delete</button>'
            }
          }
          ]
      
           });
        });
      $('.submitBtn').on('click',function()
      {
      var post = new Object();
      post.productcat = $('#productcat').val();
      var url = "/product/category/submit";
      $.ajax({
        url : url,
        data : post,
        type : 'post',
        success : function(response){
          $('#productcat').val("");
           oTable.ajax.reload();
        }
      });
      });
      $('#mytable').on('click', 'button.myBtn', function (){
        var id = $(this).data("id");
          var url = "/productcat/delete" +'/'+ id;
          $.ajax({
            url: url,
            success: function(response){
              oTable.ajax.reload();
            }
            });      
      });
      
   </script>
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
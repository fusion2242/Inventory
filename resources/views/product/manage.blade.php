<!DOCTYPE html>
<html>
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
      
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Manage Product
            <small>Product</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Product</li>
            <li class="active">Manage Product</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php if(Session::has('deleted')):?>
         <div class="alert alert-danger alert-dismissible deletediv">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                  <?php echo session('deleted')?>
              </div>
            <?php endif?>
            <?php if(Session::has('updated')):?>
            <div class="alert alert-info alert-dismissible updatediv">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Updated!</h4>
                <?php echo session('updated')?>
              </div>
            <?php endif?>
         <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Quantity</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($pro as $s): ?>
                     <?php  $a = DB::table('product_category')->where('id',$s->product_category)->first();
                        ?>
                     <tr>
                        <td><?php echo $s->product_code?></td>
                        <td><?php echo $s->product_name?></td>
                        <td><?php echo $a->category?></td>
                        <td><?php echo $s->product_quantity?></td>
                        <td><?php echo $s->buying_price?></td>
                        <td><?php echo $s->selling_price?></td>
                        <td><?php echo $s->date?></td>
                        <td>
                           <a  class="editBtn"  data-toggle="modal"  data-target="#modal_form_vertical" data-id ="<?php echo $s->id?>">  
                           <i class="glyphicon glyphicon-pencil" style="color:Dimgray;"></i></a>
                           &nbsp&nbsp&nbsp
                           <a href="/manageproduct/product/delete/<?php echo $s->id?>">
                           <i class="glyphicon glyphicon-trash" style="color:Dimgray;"></i>  
                           </a>                              
                        </td>
                     </tr>
                     <?php endforeach ?>
                     </tfoot>
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
   <div id="modal_form_vertical" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h5 class="modal-title">Product Update</h5>
            </div>
            <div>
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label>Product Code</label>
                           <input type="text" id="pro_code" class="form-control" >
                           <input type="hidden" id="modalid">
                          
                        </div>
                        <div class="col-sm-6">
                           <label>Product Name</label>
                           <input type="text" id="pro_name" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label>Product Quantity</label>
                           <input type="text" id="pro_quantity" class="form-control">
                        </div>
                        <div class="col-sm-6 col-lg-6">
                           <label>Product Category</label>
                           <select class="form-control" id="pro_cat">
                              <?php foreach($cat as $c):?>
                              <option value="<?php echo $c->id ?>"><?php echo $c->category?></option>
                              <?php endforeach?>
                           </select>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                       <div class="col-sm-6 col-lg-6">
                        <label>Buying Price</label>
                        <input type="text" class="form-control" id="b_price" placeholder="Enter buying price">
                          <input type="hidden" name="_token" id="token" value="<% csrf_token() %>">
                        
                     </div>
                     <div class="col-sm-6 col-lg-6">
                        <label>Selling Price</label>
                        <input type="text" class="form-control" id="s_price" placeholder="Enter selling price">
                     </div>
                    </div>
                  
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button  class="btn btn-primary updateBtn">Submit form</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- ./wrapper -->
   <!-- jQuery 2.2.3 -->
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
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
   <script type="text/javascript">
   $(document).ready(function()
   {
    setTimeout(function(){$('.deletediv').fadeOut(2000);},
              3000);
   setTimeout(function(){$('.updatediv').fadeOut(2000);},
              3000);
   });
      $('.editBtn').on('click', function(){
        var id = $(this).data("id");
        var url = '/manageproduct/product/update'+'/'+id;
        $.ajax({
          url: url,
          success: function(response){
            var data = $.parseJSON(response);
            $('#modalid').val(data.id);
            $('#pro_code').val(data.product_code);
            $('#pro_name').val(data.product_name);
            $('#pro_cat').val(data.product_category);
            $('#pro_quantity').val(data.product_quantity);
            $('#b_price').val(data.buying_price);
            $('#s_price').val(data.selling_price);
          
      
            // $('#lnameModal').val(data.lastName);
            // $('#idModal').val(id);
      
          }
      
        });
      })
      $('.updateBtn').on('click',function()
      {
        var post = new Object();
        var id = $('#modalid').val();
        post.product_code = $('#pro_code').val();
        post.product_name = $('#pro_name').val();
        post.product_quantity = $('#pro_quantity').val();
        post.product_category = $('#pro_cat').val();
        post.buying_price = $('#b_price').val();
        post.selling_price = $('#s_price').val();
        post._token = $('#token').val();
        var url = '/manageproduct/product/submitupdate'+ '/' + id;
        $.ajax({
          url : url,
          data : post,
          type : 'post',
          success : function(response)
          {
            setTimeout(function(){location.reload()},500);
          }
        });
      });
      
   </script>
   page script
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
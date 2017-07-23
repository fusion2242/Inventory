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
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Manage Supplier
            <small>supplier</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Homes</a></li>
            <li class="active">Purchase</li>
            <li class="active">Supplier</li>
            <li class="active">Manage Supplier</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content box-info">
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
                        <th>Company Name</th>
                        <th>Supplier Name</th>
                        <th>Supplier Email</th>
                        <th>Supplier Phone</th>
                        <th>Address</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($sup as $s): ?>
                     <tr>
                        <td><?php echo $s->companyname?></td>
                        <td><?php echo $s->suppliername?></td>
                        <td><?php echo $s->email?></td>
                        <td><?php echo $s->phone?></td>
                        <td><?php echo $s->address?></td>
                        <td><?php echo $s->comments?></td>
                        <td><?php echo $s->created_on?></td>
                        <td>
                           <a  class="editBtn"  data-toggle="modal"  data-target="#modal_form_vertical" data-id ="<?php echo $s->id?>">  
                           <i class="glyphicon glyphicon-pencil" style="color:Dimgray;"></i></a>
                           &nbsp&nbsp&nbsp
                           <a href="/managepurchase/supplier/delete/<?php echo $s->id?>">
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
   <div id="modal_form_vertical" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h5 class="modal-title">Supplier Update</h5>
            </div>
            <form action="#">
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label>Company Name</label>
                           <input type="text" id="com_name" class="form-control" >
                           <input type="hidden" id="modalid">
                        </div>
                        <div class="col-sm-6">
                           <label>Supplier Name</label>
                           <input type="text" id="supp_name" class="form-control">
                           <input type="hidden" id="token" value ="<% csrf_token() %>">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label>Supplier Email</label>
                           <input type="text" id="supp_email" class="form-control">
                        </div>
                        <div class="col-sm-6 col-lg-6">
                           <label>Supplier Phone</label>
                           <input type="text" id="supp_phone" class="form-control">
                        </div>
                        <div class="col-sm-12">
                           <br>
                           <label>Supplier Address</label>
                           <textarea rows="2" id="supp_address" class="form-control"></textarea>
                        </div>
                        <div class="col-sm-12">
                           <br>
                           <label>Comment</label>
                           <textarea rows="2" id="comments" class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary updateBtn">Submit form</button>
               </div>
            </form>
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
        var url = '/managepurchase/supplier/update'+'/'+id;
        $.ajax({
          url: url,
          success: function(response){
            var data = $.parseJSON(response);
            $('#com_name').val(data.companyname);
            $('#modalid').val(data.id);
            $('#supp_name').val(data.suppliername);
            $('#supp_email').val(data.email);
            $('#supp_phone').val(data.phone);
            $('#supp_address').val(data.address);
            $('#comments').val(data.comments);
      
            // $('#lnameModal').val(data.lastName);
            // $('#idModal').val(id);
      
          }
      
        });
      })
      $('.updateBtn').on('click',function()
      {
        var post = new Object();
        var id = $('#modalid').val();
        post.company_name = $('#com_name').val();
        post.supp_name = $('#supp_name').val();
        post.supp_email = $('#supp_email').val();
        post.supp_phone = $('#supp_phone').val();
        post.supp_address = $('#supp_address').val();
        post._token = $('#token').val();
        var url = '/managepurchase/supplier/submitupdate'+'/'+ id;
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
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
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Manage Employee
            <small>Customer</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Employee</li>
            <li class="active">Manage Employee</li>
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
                        <th>Employee Name</th>
                        <th>Employee User Name</th>
                        <th>Employee Email</th>
                        <th>Employee Phone</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($emp as $e):?>
                     <tr>
                        <td><?php echo $e->employee_name?></td>
                        <td><?php echo $e->employee_user?></td>
                        <td><?php echo $e->employee_email?></td>
                        <td><?php echo $e->employee_phone?></td>
                        <td>
                           <a data-toggle="modal"  data-target="#modal_form_vertical">
                           <i class="glyphicon glyphicon-pencil edit" style="color:Dimgray;"  data-id="<?php echo $e->id?>"></i>  
                           </a> 
                           &nbsp
                           &nbsp
                           <a href="/employee/delete/<?php echo $e->id?>">
                           <i class="glyphicon glyphicon-trash" style="color:Dimgray;"></i>  
                           </a>                             
                        </td>
                     </tr>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   @include('footer')<!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
   </aside>
   <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
   </div>
   <div id="modal_form_vertical" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h5 class="modal-title">Employee Update</h5>
            </div>
            <form action="#">
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label>Employee Name</label>
                           <input type="text" id="emp_name" class="form-control" placeholder="Enter Employee Name">
                           <input type="hidden" id="token" value ="<% csrf_token() %>">
                        </div>
                        <div class="col-sm-6">
                           <label>Employee User Name</label>
                           <input type="text" id="user_name" class="form-control" placeholder="Enter Employee UserName">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Employee Email</label>
                           <input type="text" id="email_emp" class="form-control" placeholder="Enter Employee Email">
                        </div>
                        <div class="col-sm-4">
                           <label>Employee Phone</label>
                           <input type="text" id="emp_phone" class="form-control" placeholder="Enter Employee Phone">
                        </div>
                        <div class="col-sm-4">
                           <label>Employee Phone</label>
                          <textarea name="" id="comment" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary  upsubmit ">Submit form</button>
               </div>
            </form>
         </div>
      </div>
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
   <!-- page script -->
   <script type="text/javascript">
   $(document).ready(function()
   {
    setTimeout(function(){$('.deletediv').fadeOut(2000)},3000);
     setTimeout(function(){$('.updatediv').fadeOut(2000)},3000);

   });
   </script>
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
      
      
      var id;
      
      $('.edit').on('click',function(){
      
      var div = $(this);
        id = $(this).data("id");
            var url = '/employee/update'+'/'+id;
      
         $.ajax({
             url: url,
             success: function(response){
                var data = $.parseJSON(response);
                $('#emp_name').val(data[0].employee_name);
                $('#emp_phone').val(data[0].employee_phone);
                $('#user_name').val(data[0].employee_user);
                $('#email_emp').val(data[0].employee_email);
                $('#comment').va;(data[0].comments);
            
             }
                });
      });
      
      $('.upsubmit').on('click',function(){
      var post = new Object();
      
      
      post.employee_name = $('#emp_name').val();
      post.employee_email = $('#email_emp').val();
      post.employee_user = $('#user_name').val();
      post.employee_phone = $('#emp_phone').val();
      post._token = $('#token').val(); 
      
      var url = '/employee/updated'+'/'+id;
      $.ajax({
      
        url : url,
        data : post,
        type : 'post',
      
        success: function(response){
      
          setTimeout(function(){
              location.reload();
          },1000)
      
       }
      
      });
      });
      
       
   </script>
   </body>
</html>
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
   
   </head>
   @include('header')
   <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Add Product
            <small>product</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Product</li>
            <li class="active">Add Product</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
         <?php if(Session::has('success')):?>
         <div class="alert alert-success alert-dismissible alertdiv">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo session('success')?> 
         </div>
         <?php endif?>
         <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Add Project Here</h3>
            </div>
            <div class="box-body">
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-4">
                        <label>Product Code</label>
                        <input type="text"  id="pro_code" class="form-control" placeholder="XXX-X">
                     </div>
                     <div class="col-md-4">
                        <label>Product Name</label>
                        <input type="text" id="pro_name" class="form-control" placeholder="Product name">
                     </div>
                     <div class="col-md-4">
                        <label>Initial Quantity</label>
                        <input type="number"  id="pro_quantity" class="form-control" placeholder="e.g: 123">
                        <input type="hidden" name="_token" id="token" value="<% csrf_token() %>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-4">
                        <label>Product Category</label>
                        <select class="form-control" id="pro_cat">
                           <?php foreach ($cat as $c):?>
                           <option value="<?php echo $c->id?>"><?php echo $c->category?></option>
                           <?php endforeach?>
                        </select>
                     </div>
                     
                     <div class="col-md-4">
                        <label>Product Image</label>
                        <input  id="fileinput" type="file" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);">
                     </div>
                     <div class="col-md-4">
                       <img src="http://via.placeholder.com/140x100" id="falseinput" style="width: 100px;text-align: center;"/>
                       </div>
                     <!--  <div class="row">
                        <div class="form-group">
                        <div class="col-md-4">
                        <label>Product Image</label>
                        <input type="file" id="pro_img" placeholder="Username">
                        </div>
                        -->     
                     <!--      <div class="col-md-4">
                        <label>Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right createdon" id="datepicker">
                        </div>
                        </div>
                        
                        -->   
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-4">
                        <label>Supplier</label>
                        <select class="form-control" id="supplier">
                           <?php foreach ($sup as $s):?>
                           <option value="<?php echo $s->id?>"><?php echo $s->suppliername?></option>
                           <?php endforeach?>
                        </select>
                     </div>
                 
              
                 
                     <div class="col-md-4">
                        <label>Buying Price</label>
                        <input type="number" class="form-control" id="b_price" placeholder="Enter buying price">
                        
                     </div>
                     <div class="col-md-4">
                        <label>Selling Price</label>
                        <input type="number" class="form-control" id="s_price" placeholder="Enter selling price">
                        <br>
                    

          
          
               <button type="submit"  class="btn btn-primary pull-right submit">Save</button>
                </div>
           
           
               </div>
               <!-- /input-group -->
            
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
       
         <!-- /.box -->
         <!-- Input addon -->
       
   </div>
   <!-- /.box-body -->
   </div>
   <!-- /.box -->
   </section>
   <!-- /.content -->
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
   <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function()
      {
        
       setTimeout(function(){$('.alertdiv').fadeOut(2000)},3000);
         $('.removeField').hide(); 
         $('.addtierform').hide();
       
      });
   </script>
   <script type="text/javascript">
      $('.clicktier').on('click',function()
      {
        $('.addtierform').show();
      });
      $('.addnewField').on('click',function(){
              $('#addattributeform').clone(true, true)
              .find('input:text').val('').end()
              .insertBefore('.insertBeforClass');
              $('.removeField').show();
        });
      $('.removeField').on('click', function() {
          var div = $(this);
          if ($('.addattributeform').length ===1) {
      
            alert("cant remove");
              }
          else{
              
                    div.closest('.addattributeform').remove();
                      
                  }
                
                 
            });
      $('.addnewtier').on('click',function(){
              $('#addtierform').clone(true, true)
              .find('input:text').val('').end()
              .insertBefore('.insertBeforeClass');
              $('.removetier').show();
        });
      $('.removetier').on('click', function() {
          var div = $(this);
          if ($('.addtierform').length ===1) {
      
            alert("cant remove");
              }
          else{
              
                    div.closest('.addtierform').remove();
                      
                  }
                
                 
            });
   </script>
   <!-- Bootstrap 3.3.6 -->
   <script src="/bootstrap/js/bootstrap.min.js"></script>
   <!-- Select2 -->
   <script src="/plugins/select2/select2.full.min.js"></script>
   <!-- InputMask -->
   <script src="/plugins/input-mask/jquery.inputmask.js"></script>
   <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
   <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
   <!-- date-range-picker -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
   <script src="/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- bootstrap datepicker -->
   <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
   <!-- bootstrap color picker -->
   <script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
   <!-- bootstrap time picker -->
   <script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
   <!-- SlimScroll 1.3.0 -->
   <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- iCheck 1.0.1 -->
   <script src="/plugins/iCheck/icheck.min.js"></script>
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
        $(".select2").select2();
      
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
      
        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
       
      
        //Date picker
        $('#datepicker').datepicker({
          format: 'yyyy-mm-dd'
      
        });
      
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
      
        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();
      
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
   </script>
   <script type="text/javascript">
   var baseImg;
    		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
				$('#falseinput').attr('src', e.target.result);
				console.log(e.target.result);
        baseImg = e.target.result;
				};
				reader.readAsDataURL(input.files[0]);
			}
        }


   ////////
      $('.submit').on('click',function(){
         var date = new Date();
        createdDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        var post = new Object();
         var category = new Object();
         category.productcode = $('#pro_code').val();
         category.product_name = $('#pro_name').val();
         category.product_quantity = $('#pro_quantity').val();
         category.product_category = $('#pro_cat').val();
         category.product_image = baseImg;
         category.created_on = createdDate;
         category.supplier = $('#supplier').val();
         category._token = $('#token').val(); 
         category.buying_price = $('#b_price').val();
         category.selling_price = $('#s_price').val();
      
         var url ="/addproduct";
         $.ajax({  
      
                url: url,
                data: category,
                type:'post',
                success: function(response){
                   window.setTimeout(function(){window.location.reload();},1000)
       $('.pro_code').val("");
       $('.pro_name').val("");
       $('.pro_quantity').val("");
       $('.pro_cat').val("");
       $('.pro_img').val("");
       
                  // setTimeout(function(){
                  //   location.href= "/employee";
                  // },2000);
      
                }
      
      
      
         });
      
      });
      
   </script>
   </body>
</html>
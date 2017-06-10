<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inventory | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- daterange picker -->
      <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="/plugins/iCheck/all.css">
      <!-- Bootstrap Color Picker -->
      <link rel="stylesheet" href="/plugins/colorpicker/bootstrap-colorpicker.min.css">
      <!-- Bootstrap time Picker -->
      <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">
      <!-- Select2 -->
      <link rel="stylesheet" href="/plugins/select2/select2.min.css">
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
   @include('header')  <!-- Left side column. contains the logo and sidebar -->
   @include('nav')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Ledgers
            <small>Party Ledgers</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Ledgers</li>
            <li class="active">Party Ledgers</li>
         </ol>
      </section>
      <!-- Main content -->
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
         <?php if(Session::has('success')):?>
         <div class="alert alert-success alert-dismissible alertdiv">
            <button type="button" class="close closeBtn" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo session('success')?> 
         </div>
         <?php endif?>
         <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Add Party Ledgers Here</h3>
            </div>
            <div class="box-body div">
               <div class="alert alert-danger alert-dismissible">
                  <p>Please Insert the Required Field</p>
               </div>
            </div>
            <div class="box-body">
               <!-- <div class="alert alert-success alert-dismissible" id="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Alert!</h4>
                  Success alert preview. This alert is dismissable.
                  </div> -->
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-6">
                        <label>Select Account Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Select an account">
                     </div>
                        <div class="col-md-6">
                        <label>Date</label>
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input type="text" class="form-control pull-right createdon" id="datepicker">
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
               <br>

            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content -->
   <!-- /.content-wrapper -->
   <footer class="main-footer">
      <div class="pull-right hidden-xs">
         <b>Version</b> 2.3.8
      </div>
      <strong>Copyright &copy; 2014-2017 <a href="http://fustech.net">Fusion Technologies</a>.</strong> All rights
      reserved.
   </footer>
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
   <script src="/js/supplier.js"></script>
   <script type="text/javascript">
      $(document).ready(function()
      {
        $('.div').hide();
         setTimeout(function(){$('.alertdiv').fadeOut(2000);},
              3000);
      });
      
   </script>
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
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
            function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
      
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
   </body>
</html>
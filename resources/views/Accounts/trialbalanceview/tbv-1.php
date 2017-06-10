<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Employee</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery_ui/touch.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){
      $('.daterange-basic').pickadate({
        format: 'yyyy-mm-dd'
      });
      $('.daterange-basic2').pickadate({
        format: 'yyyy-mm-dd'
      });
       $('.selectOne').select2();
    $('.selectTwo').select2();
    $('.selectThree').select2();
    });
   
  </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/anytime.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/styling/uniform.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/form_inputs.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/pnotify.min.js"></script>

  
</head>
<body>

<?php $this->load->view('header')?>

  <!-- Main navbar -->


<?php $this->load->view('nav')?>

  <div class="page-header-content">
            <div class="panel border-top-primary">
            <div class="page-header" style="margin: 0; border-bottom: 0; background-color: #fff;">
              <div class="page-header-content">
                <div class="page-title">
                  <h5>
                    <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Trial Balance View </span>- Trial Balance View 1
                                  </h5>
                </div>

              </div>
            </div>
          </div>
              
            
     
      </div>
  <div id ="container">
  <div class="footer clearfix">
     <div class="pull-left" style="margin-left:20px;">© 2016. Al-Mehran Builders</div>
    </div>
    </div>

</body>
</html>

<script type="text/javascript">
  $('.createSub').on('click',function(){
    var id = $(this).data("id");
    var divd = '<tr><td>sub class</td><td></td><td></td></tr>';
     // $(div).insertBefore('#insertBeforeclass'+id);
      divd.insertBefore($('.insertBeforeclass'+id));

  });
</script>
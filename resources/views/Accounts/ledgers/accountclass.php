<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accounts Class</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery_ui/effects.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/jgrowl.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/ui/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <!-- /core JS files -->

  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/app.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/pnotify.min.js"></script>
</head>

<?php $this->load->view('header')?>

  <!-- Main navbar -->

<?php $this->load->view('nav')?>

   <div class="page-header-content">
            <div class="panel border-top-primary">
            <div class="page-header" style="margin: 0; border-bottom: 0; background-color: #fff;">
              <div class="page-header-content">
                <div class="page-title">
                  <h5>
                    <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Chart of Account</span> - Accounts Class
                                  </h5>
                </div>
              </div>
            </div>
          </div>


<div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title text-center" style="font-weight:bold;">
            CHART OF ACCOUNT
          </h6>
        </div>
        
        <div class="panel-body">
           <div class="form-group">
             <div class="row">
                    <div class="col-sm-3 center-table">
                    <div class="table table-condensed">
                        <table class="table datatable-basic">
                          <tr>
                            <th>Account name</th>
                             </tr>

                          <tr>
                <?php foreach($class as $co_class) : ?>              
                         <td><?php echo $co_class->account ?></td>
                         <td class="text-center">
                            
                          </td>
                        </tr>
                        <?php endforeach ?>

                  
            </table>

                    </div>
                  </div>
                 </div>
              </div> 
            </div>
          </div>
</div>

<style type="text/css">
.center-table
{
  margin: 0 auto !important;
  float: none !important;
}
</style>
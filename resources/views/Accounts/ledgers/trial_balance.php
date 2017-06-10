<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Trial Balance</title>
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
                        <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Accounts  - Ledgers </span>- Trial Balance
                     </h5>
                  </div>
               </div>
            </div>
         </div>
         <div>
            <div class="row">
               <div class="col-md-12">
                  <!-- Basic layout-->
                  <div class="panel panel-flat">
                     <div class="panel-heading">
                        <h5 class="panel-title">Trial Balance</h5>
                        <div class="heading-elements">
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="table-responsive">
                           <table class="table table-lg tbtable">
                              <thead>
                                 <tr>
                                    <th>Accounts</th>
                                    <th class="col-sm-1">Debit</th>
                                    <th class="col-sm-1">Credit</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    foreach ($co_class as $value) : ?>                    
                                 <tr class="level1" id="mainAccounts<?php echo $value->id ?>">
                                    <td> <b><?php echo $value->account; ?></b>
                                       <a class="glyphicon-plus createSub" 
                                          data-id="<?php echo $value->id; ?>"></a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                 </tr>
                                 <?php  $this->load->model('ledgers_model');
                                    $data_cogroup =  $this->ledgers_model->getsubgroup($value->id); ?>
                                 <?php foreach ($data_cogroup as $key): ?>
                                 <tr class="level2<?php echo $value->id; ?> levelTwo ">
                                    <td style="color:rgba(0,0,0,1);"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <?php echo $key->name; ?>
                                       <a class="glyphicon-plus createSub1" 
                                          data-id="<?php echo $key->id; ?>"></a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <?php 
                                       $data_coaccount =  $this->ledgers_model->getco_account($key->id); 
                                       // print_r($data_coaccount);
                                       
                                       ?>
                                    <?php foreach ($data_coaccount as $key1): ?>
                                  <tr class="level3<?php echo $key->id; ?> levelThree">
                                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <?php echo $key1->co_account; ?>
                                       <a class="glyphicon-plus createSub2" 
                                          data-id="<?php echo $key1->id; ?>"></a>
                                    </td>
                                    
                                    <td></td>
                                    <td></td>
                                   <?php
                                      $data_subaccount =  $this->ledgers_model->getsubaccount($key1->id); 
                                      
                                      foreach ($data_subaccount as $key2) : ?>
                                       <tr class="level4<?php echo $key1->id; ?> levelFour">
                                          <td style="color:rgba(0,0,0,.6);"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <?php echo $key2->account_name; ?>
                                             <a class="glyphicon-plus createSub3" 
                                                data-id="<?php  echo $key2->id; ?>"></a>
                                          </td>
                                    <?php $amount = $this->ledgers_model->getAmount($key2->id);
                                       //echo "<pre>"2
                                       //print_r($amount);
                                       $debitsum=0;
                                       $creditsum=0;
                                       foreach ($amount as $debit) {
                                         if($debit->type == 'debit'){
                                          $debitsum = $debitsum + $debit->amount;
                                         }
                                         else
                                         {
                                           $creditsum = $creditsum + $debit->amount;
                                         }
                                       
                                       }
                                       //echo $debitsum;
                                       //echo $creditsum;
                                       if($debitsum > $creditsum){
                                            $tamount = $debitsum - $creditsum;
                                            echo "<td>".$tamount."</td>";
                                            echo "<td></td>";
                                       
                                       }
                                       else if($creditsum > $debitsum)
                                       {
                                           $tamount = $creditsum - $debitsum;
                                           echo "<td></td>";
                                           echo "<td>".$tamount."</td>";
                                       }
                                       else if ($creditsum == 0 && $debitsum ==0 ){
                                           echo "<td></td>";
                                        }
                                       //echo $tamount;
                                       ?>

                                          <td></td>
                                      </tr>                                        
                                      <?php endforeach ?>
                                    </tr> 
                                  </tr>
                                    <?php endforeach ?>
                                    <?php endforeach ?>
                                    <?php endforeach ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
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


$(document).ready(function(){
    $('.levelTwo').hide();
    $('.levelThree').hide();
    $('.levelFour').hide();
});


$('.createSub').on("click", function(){
var id = $(this).data("id");
$('.level2'+id).toggle();
   
});

$('.createSub1').on("click", function(){
  var id3 = $(this).data("id");
      $('.level3'+id3).toggle();
});
   
$('.createSub2').on("click", function(){
  var id4 = $(this).data("id");
      $('.level4'+id4).toggle();
});


   
   
</script>
<style type="text/css">
  .tbtable {
  border-collapse: collapse;
  line-height: 80px;
}

</style>
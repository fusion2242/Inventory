<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Balance Sheet</title>

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

<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.daterange-basic').pickadate({
        format: 'yyyy-mm-dd'
      });
      $('.daterange-basic2').pickadate({
        format: 'yyyy-mm-dd'
      });
      $('.select-search').select2({
         placeholder: "Select a State",
        allowClear: true
       });
      var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    ((''+day).length<2 ? '0' : '') + day;
      $('.daterange-basic').val(output);
    });
  </script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/jquery_ui/effects.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/jgrowl.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/ui/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <!-- /core JS files -->
  <script type="text/javascript">
    $(document).ready(function($) {
     
    $('.daterange-basic').pickadate({
        format: 'yyyy-mm-dd'
      });
      $('.daterange-basic2').pickadate({
        format: 'yyyy-mm-dd'
      });
    });
  </script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/app.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/pnotify.min.js"></script>
</head>

<?php $this->load->view('header')?>

  <!-- Main navbar -->

<?php $this->load->view('nav')?>
      <!-- Main content -->
      <!-- Main content -->

           <div class="page-header-content">
            <div class="panel border-top-primary">
            <div class="page-header" style="margin: 0; border-bottom: 0; background-color: #fff;">
              <div class="page-header-content">
                <div class="page-title">
                  <h5>
                    <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Vouchures</span> - Bank Recieving Voucher
                                  </h5>
                </div>
              </div>
            </div>
          </div>



<div class="panel panel-default">
    <div>
        <div class="panel-heading"><h6 class="panel-title" style="font-weight:bold; text-transform: uppercase;">
            AL MEHRAN BUILDERS PAK (PVT) LTD <br> STATEMENT OF FINANCIAL POSITION <br> AS ON <?php echo date('M d, Y')?> </h6></div>
          <div class="panel-body">

              <div class="col-md-4" style="float: right;">
              <h6 class="panel-title" style="font-weight:bold; text-align: center;">
              <?php echo date('Y')?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo date('Y')-1?> <br> Rs In '000</h6>
            </div>
             <div class="form-group">
              <div class="row">

                <div class="col-md-4" style="clear: left;">
                  <label style="font-weight:bold;">Non-Current Assets</label>
                  <br><label>Property, Plant and Equipment</label>
                  <br><label>Intangible Assets</label>
                  <br><label>Long Term Investment</label>
                  <br><label>Long Term Loans And Advances</label>
                  <br><label>Long Term Deposits And Prepayments</label>
              </div>

              <div class="col-md-1">
                  <label style="font-weight:bold;">&nbsp;</label>
                  <br><label>1</label>
                  <br><label>2</label>
                  <br><label>3</label>
                  <br><label>4</label>
                  <br><label>5</label>
                </div>
            <div class="col-md-3" style="text-align: center;">
            <div style="margin-top: 70px;">
                <input type="text" value="15" disabled="disabled" style="text-align:right;">
            </div>
            </div>

                

                <div class="col-md-4" style="clear: left;"><br>
                  <label style="font-weight:bold;">Current Assets</label>
                  <br><label>Stores, Spares and Loose Tools</label>
                  <br><label>Stock In Trade</label>
                  <br><label>Trade Receivable</label>
                  <br><label>Loan And Advances</label>
                  <br><label>Deposits And Prepayments</label>
                  <br><label>Interest Accrued</label>
                  <br><label>Other Receivable</label>
                  <br><label>Investments</label>
                  <br><label>Tax Refund Due From Government</label>
                  <br><label>Cash And Bank Balances</label>
              </div>

              <div class="col-md-1"><br>
                  <label style="font-weight:bold;">&nbsp;</label>
                  <br><label>6</label>
                  <br><label>7</label>
                  <br><label>8</label>
                  <br><label>9</label>
                  <br><label>10</label>
                  <br><label>&nbsp;</label>
                  <br><label>11</label>
                  <br><label>12</label>
                  <br><label>&nbsp;</label>
                  <br><label>13</label>
                </div>

              <div class="col-md-3" style="text-align: center;">
            <div style="margin-top: 260px;">
                <input type="text" value="15" disabled="disabled" style="text-align:right;">
            </div>
            <hr>
            </div>

              <div class="col-md-4" style="clear: left;">
                <br><h6 class="panel-title"><label  class="control-label" style="font-weight:bold;">Share Capital And Reserves</label></h6>
              </div>
              <div class="col-md-4" style="clear: left;">
                <label  class="control-label" style="font-weight:bold;">Authorized</label>
                <br><label>1000000 Shares Of Rs 10 Each</label>
              </div>
              <div class="col-md-4" style="clear: left;">
                  <label style="font-weight:bold;">Issued, Subscribed And Paid Up Capital</label>
                  <br><label>800000 Shares Of Rs 10 Each</label>
                  <br><label>Capital Reserves</label>
                </div>
              <div class="col-md-1">
                  <label style="font-weight:bold;">&nbsp;</label>
                  <br><label>14</label>
                  <br><label>15</label>
                </div>
              </div>
            </div>


                <div class="form-group">
              <div class="row">
                       <div class="col-md-4">
                <label class="display-block" style="font-weight:bold;">Surplus On Revaluation Of Fixed Assets</label>
              
              </div>
              <div class="col-md-4" style="clear: left;">
                  <label style="font-weight:bold;">Non-Current Liabilities</label>
                  <br><label>Long Term Financing</label>
                  <br><label>Debentures</label>
                  <br><label>Long Term Deposits</label>
                  <br><label>Retirement Benefit Liabilities</label>
              </div>

              <div class="col-md-1">
                  <label style="font-weight:bold;">&nbsp;</label>
                  <br><label>&nbsp;</label>
                  <br><label>&nbsp;</label>
                  <br><label>&nbsp;</label>
                  <br><label>&nbsp;</label>
                </div>

              <div class="col-md-4" style="clear: left;">
                  <br><label style="font-weight:bold;">Current Liabilities</label>
                  <br><label>Trade And Other Payables</label>
                  <br><label>Provisions</label>
                  <br><label>Interest And Mark Up Accrued</label>
                  <br><label>Short Term Borrowings</label>
                  <br><label>Current Portion Of Long Term Borrowings</label>
                  <br><label>Provision Of Taxation</label>
              </div>
              
              <div class="col-md-1">
                  <br><label style="font-weight:bold;">&nbsp;</label>
                  <br><label>16</label>
                  <br><label>&nbsp;</label>
                  <br><label>17</label>
                  <br><label>18</label>
                  <br><label>&nbsp;</label>
                  <br><label>&nbsp;</label>
                </div>

                  </div>
                </div>
                  
                
        </div>
      </div>
    </div>

</div>
</div>
</div>
</div>



  <div class="footer clearfix">
     <div class="pull-left" style="margin-left:20px;">© 2016. Al-Mehran Builders</div>
    </div>
</body>
</html>
<script type="text/javascript">
 var select = $('.select-search');
  $('.addNewDebit').on('click',function(){
           
            var div = $('#debitTr');
            select.select2("destroy");
            
            var clone = div.clone(true).find('input:text').val("").end();
            select.select2();
            clone.insertAfter('#debittTr').find('select').select2();
  });
</script>


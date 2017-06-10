<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Payment Voucher</title>

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
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/sweet_alert.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->


       <script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/pnotify.min.js"></script>
  <!-- Theme JS files -->


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
                    <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Vouchures</span> - Bank Payment Vouchers
                                  </h5>
                </div>
              </div>
            </div>
          </div>

<div class="panel panel-default">
    <div>
        <div class="panel-heading">
          <h6 class="panel-title text-center" style="font-weight:bold;">
            AL MEHRAN BUILDERS PAK (PVT) LTD <br> B-4, BLOCK 16, GULSHAN-E-IQBAL, KARACHI <br> BANK PAYMENT VOUCHER
          </h6>
            <div class ="col-md-4 text-left">
               <span>Date:&nbsp&nbsp<input type="text" class="daterange-basic date" name=""></span>
            </div>
            <div class ="col-md-4 text-center">
              <b> </b>
            </div>

            <div class ="col-md-4 text-right">
                <span><b> Serial #: </b><span class="serialno"><?php echo random_string('numeric', 6); ?></span></span>
            </div>

          </div>


   <div class="panel-body">
        <div class="form-group">
             <div class="row">
                <div class="form-group">
        <div class="table-responsive">
              <table class="table table-lg">

                <tr>
                  <th>Account Name</th>
                  <th>Debit</th>
                  <th>Credit</th>
                </tr>
           <tr id="debitTr">
                  <td>
                  <br>
  <select data-placeholder="Select an account"
                          name ="acc_name" 
                          class="sel select-search account_name" data-type="debit">
                          <option></option>
                      <optgroup label="Select Account Name">



              <?php foreach ($leveltwo as $level2) : ?>
                   <option value="<?php echo $level2->id; ?>">
                   <?php echo $level2->co_account; ?></option>
                         <?php foreach ($levelthree as $level3 ) :  ?>
                           <?php if($level2->id == $level3->parent_id) : ?>
                                <option value="<?=$level3->id;?>">
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;<h4><?php echo $level3->account_name; ?></h4></option>
                                    <?php foreach ($levellast as $last) :
                                          if($level3->id == $last->parent_id) : ?>
                                                <option value="<?=$last->id;?>">
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <h5><?php echo $last->account_name; ?></h5></option>
                                          <?php endif ?>

                                    <?php endforeach ?>
                            <?php endif ?>
                         <?php endforeach ?>
              <?php endforeach ?>
</optgroup>
   </select>
                   </td>

              <td>
                    <div class"col-md-1" >
   <!--                        <input type="text" name="Debit" class="form-control" placeholder="Enter Debit" style="width: 166px;">
                          <span><i class="icon-plus3 btn border-warning text-warning-600 btn-flat btn-icon addNewField"></i></span>
      -->

              <div class="row">


                   <div class="col-md-6">
                  <label style="font-weight:bold;"></label>
                  <input type="text" name="Mobile"    placeholder="Debit" class="form-control amount DesgName">


                </div>

                <div class="col-md-4">

                <br>
                 <button type="button" class="btn border-warning text-warning-600 btn-flat btn-icon addNewDebit"><i class="icon-plus3"></i></button>
                 <button type="button" class="btn border-warning text-warning-600 btn-flat btn-icon removeField"><i class="icon-minus3"></i></button>
                </div>
              </div>
    </div>

              </td>




                    <td></td>
                </tr>
                <div class="newDebit"></div>
                  <tr class="even creditTr">
                    <td><label style="font-weight:bold;">Bank: </label>

                      <select class="sel select-search" style="width: 120px;">
                        <option value="HBL">HBL</option>
                        <option value="Al-Habib">Al-Habib</option>
                      </select>

                    </td>
                    <td>
                    </td>
                    <td><input type="text" name="credit" id="amount" class="form-control credit" placeholder="Enter Debit" readonly></td>
                  </tr>

              </table>
            </div>
          </div>
          </div>


          <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                  <h6 class="panel-title"></h6>
                </div>

            <div class="panel-body">

              <div class="col-md-12">
                <div class="form-group">
                        <label>Narration:</label>
                        <input type="text"  name="narration" id="narration"
                        class="form-control" placeholder="Enter naaration">
                </div>
              </div>
              <div class="col-md-12">
                        <label>In Words:</label>
                        <input type="text" id="" name=""
                        class="form-control inWords"  disabled="disabled">
                        <br>

                </div>

              <div class="col-md-12">
                 <div class="col-md-3">
                      <div class="form-group">
                        <label>Amount Being paid to:</label>
                        <input type="text"  name="amountpaid" id="amountpaid"
                        class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                   <div class="col-md-3">
                      <div class="form-group">
                        <label>On behalf of: </label>
                        <input type="text"  name="onbehalfof" id="onbehalfof"
                        class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>Against:</label>
                        <input type="text"  name="against"  id="against"
                        class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>Cheque No:</label>
                        <input type="text"  name="po"  id="po"
                        class="form-control" placeholder="Enter number">
                    </div>
                  </div>
              </div>

               <div class="col-md-12">
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>Mobile #:</label>
                        <input type="text"  name="mobile"  id="mobile"
                        class="form-control" placeholder="Enter number">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <label>C.N.I.C. #:</label>
                        <input type="text"  name="nic"  id="nic"
                        class="form-control" placeholder="Enter your CNIC">
                    </div>
                  </div>

               </div>
                </div>

                </div>
          </div>
              </tr>
              </tbody>
            </table>
          <div class="col-md-12">
                <div class="form-group">
                  <br>
                <div class="form-actions text-right">
              <button value="submit" style="margin-bottom:30px; margin-right:15px;" class="btn btn-primary Btnsubmit">Save</button>

              <button value="submit" style="margin-bottom:30px; margin-right:25px;" class="btn btn-primary submitBtn">Save & Print</button>

            </div>

                </div>
              </div>
          </div>



             </div>
              </div>
              </div>


     <br>
  <div id ="container">
  <div class="footer clearfix">
     <div class="pull-left" style="margin-left:20px;">© 2016. Al-Mehran Builders</div>
    </div>
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
            clone.insertBefore('.creditTr').find('select').select2();
  });

$('.removeField').on('click',function(){
    var div = $(this);
   lengthClass = $('.debitTr').length;
  if (lengthClass === 1) {
    swal({
            title: "Oops...",
            text: "Cannot remove the only remaining field!",
            confirmButtonColor: "#EF5350",
            type: "error"
        });
  }else{
      swal({
            title: "Are you sure?",
            text: "You will not be able to recover this field!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
              div.closest('.debitTr').remove();
              $('.amount').trigger('change');
                swal({
                    title: "Deleted!",
                    text: "Field has been removed.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your field is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });//
    }

  });
var th = ['', 'thousand', 'million', 'billion', 'trillion'];

var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
function changeCurrency(s){
  s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s)) return 'not a number';
    var x = s.indexOf('.');
    if (x == -1) x = s.length;
    if (x > 15) return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i = 0; i < x; i++) {
        if ((x - i) % 3 == 2) {
            if (n[i] == '1') {
                str += tn[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            } else if (n[i] != 0) {
                str += tw[n[i] - 2] + ' ';
                sk = 1;
            }
        } else if (n[i] != 0) {
            str += dg[n[i]] + ' ';
            if ((x - i) % 3 == 0) str += 'hundred ';
            sk = 1;
        }
        if ((x - i) % 3 == 1) {
            if (sk) str += th[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
    }
    if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++) str += dg[n[i]] + ' ';
    }
   
    $('.inWords').val(str.replace(/\s+/g, ' '));


}
$(document).on("change", ".amount", function() {
    var sum = 0;
    $(".amount").each(function(){
        sum += +$(this).val();
    });
    $(".credit").val(sum);
    changeCurrency(sum);
});


</script>
<script type="text/javascript">
var ispay=1;
$('.Btnsubmit').on('click',function(){

var post = new Object();
post.date = $('.date').val();
post.serial_no = $('.serialno').text();
post.narration = $('#narration').val();
post.paid_to = $('#amountpaid').val();
post.on_behalf = $('#onbehalfof').val();
post.against = $('#against').val();
post.po_no = $('#po').val();
post.mobile_no =$('#mobile').val();
post.nic_no =$('#nic').val();
post.is_payment = ispay;
post.voucher_type = '2';
post.submitted_by = '<?php echo $this->session->userdata("user")[0]->id ?>';

    post.account_name = $.map($('.account_name'), function (el) { return el.value; });
    post.amount = $('.amount').map( function(){return $(this).val(); }).get();
    post.type = $(this).data("type"); 
    post.credit = $('.credit').val();




var url = '<?php echo site_url("accounts/voucher/insert_voucher") ?>';

$.ajax({
  url : url,
  data : post,
  type: 'post',
  success: function(response){

 new PNotify({
            title: 'Submitted',
            text: 'The payment has been made successfully.',
            addclass: 'bg-success'
        });
 $('#narration').val("");
 $('#amountpaid').val("");
 $('#onbehalfof').val("");
 $('#against').val("");
 $('#for').val("");
 $('#rupees').val("");
 $('#po').val("");
 $('#bank').val("");
 $('#branch').val("");
 $('#mobile').val("");
 $('#nic').val("");
 $('#pkr').val("");
 $('#account_name').val("");
}


});
});


</script>

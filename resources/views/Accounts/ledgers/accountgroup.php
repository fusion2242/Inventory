<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accounts Groups</title>

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
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script type="text/javascript">
  $('document').ready(function () {
        $('.selectTwo').select2();
  });
</script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/selects/select2.min.js"></script>
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
                    <i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Chart of Account</span> - Account Group
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
             
                <div class="col-md-12">

                  <div class="col-md-4">
                    <label style="font-weight:bold;">Select Account Name</label>

                      <select class="form-control" style="" name="accountclass" id="accountclass" class="selectTwo">
                        <optgroup>
                          
                          <option value="">Select Account Class</option>
                          <?php foreach ($class as $key) : ?>
                          <option value="<?php echo $key->id ?>"><?php echo $key->account ?></option>
                        <?php endforeach ?>
                        </optgroup>
                      </select>
                  </div>
                  <div class="col-md-4">
                      <label style="font-weight:bold;">Account Name</label>
                      <input type="text" name="Mobile"  name="accountgroupname" placeholder="Account Name" class="form-control" id="accountgroupname">
                  
                  </div>
                  <div class="col-md-4">
                      <label style="font-weight:bold;">Status</label>

                      <select class="form-control" style="" name="status"  id="status" class="selectTwo">
                        <optgroup>

                         
                          <option value="1">Active</option>
                          <option value="0">In Active</option>
                        </optgroup>
                      </select>

                  </div>

                </div>
              </div>
                 <div class="form-group form-actions text-right">
                             <br>
                             <button value="submit"  style="margin-bottom:-20px; margin-right:10px;" class="btn btn-primary submitBtn">Submit</button>
                 </div>   
      
              </div> 
            </div>
          </div>

                      <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Accounts Group</h5>
              
            </div>

        

            <table class="example table datatable-basic">
              <thead>
                <tr>
                  
                  <th>Account Class</th>
                  <th>Account Group</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
             <?php foreach ($gdata as $gd): ?>
               <tr>
                  <td> <?php echo $gd->account?> </td>
                  <td> <?php echo $gd->name?> </td>
                  <td> <?php if($gd->status == '1'): ?>
                    <span class="label label-success">Active</span>
                  <?php else: ?> <span class="label label-default">Inactive</span>
                <?php endif?>
                  </td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                          <li class="edtBtn" data-id="<?php echo $gd->grup_id;?>"><a  data-toggle="modal"  href="#modal_form_vertical"> Edit</a></li>
                          <li class="dltBtn" data-id="<?php echo $gd->grup_id;?>"><a> Delete</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
              </tr>
            <?php endforeach?>

                  
              </tbody>
            </table>
          </div>
</div>

          <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Edit Account Groups</h5>
                </div>

                <div>
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label>Select Account Class</label>
                          <select class="form-control" style="" name="accountclass" id="EaccClass" class="selectTwo">
                        <optgroup>
                          
                          <option value="">Select Account Class</option>
                          <?php foreach ($class as $key) : ?>
                          <option value="<?php echo $key->id ?>"><?php echo $key->account ?></option>
                        <?php endforeach ?>
                        </optgroup>
                      </select>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label>Account Name</label>
                          <input type="text" id="AccName" placeholder="Account Name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br/>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                        <label>Status</label>
                        <select class="form-control" style="" name="status"  id="Estatus" class="selectTwo">
                          <optgroup>

                            <option value="">Select Account Status</option>
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                          </optgroup>
                        </select>
                        </div>
                    </div>  
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" class="updt_data btn btn-primary">Submit form</button>
                  </div>
                </div>
              </div>
            </div>
          </div>





<script type="text/javascript">
$('.submitBtn').on('click',function(){
var post = new Object();
post.name = $('#accountgroupname').val();
post.class_id = $('#accountclass').val();
post.status = $('#status').val();
if(!$('#accountgroupname').val()){
  new PNotify({
            title: 'Error',
            text: 'Fill all the fields correctly!',
            addclass: 'bg-danger'
        });
}
else{
var url = '<?php echo site_url("accounts/ledgers/coagroup_insert") ?>';

$.ajax({
  url : url,
  data : post,
  type: 'post',
  success: function(response){
    var data = $.parseJSON(response);
    if(data['success']){
          setTimeout(function(){
              location.reload();

            },0.5);

         new PNotify({
            title: 'Added',
            text: data['msg'],
            addclass: 'bg-success'
        });

    }
    if(data['error']){
        new PNotify({
            title: 'Added',
            text: data['msg'],
            addclass: 'bg-danger'
        });
    }

 $('#accountgroupname').val("");
 $('#status').val();
}

});
}
});

  var id;
$('.edtBtn').on('click', function(){
id = $(this).data('id');
var url = '<?php echo site_url("accounts/ledgers/getgroupdata") ?>'+'/'+id;
$.ajax({
url: url,
success: function(response){
  var Data = $.parseJSON(response);
    $('#EaccClass').val(Data.accClass);
    $('#AccName').val(Data.AccName);
    $('#Estatus').val(Data.cstatus);

}
});
});

$('.updt_data').on('click',function () {
    var post = new Object;
    post.class_id = $('#EaccClass').val();
    post.name = $('#AccName').val();
    post.status = $('#Estatus').val();

    var url = '<?php echo site_url("accounts/ledgers/updateGroup")?>'+'/'+id;
    $.ajax({
      type: 'post',
      url: url,
      data : post,
      success:function(response){
        var data = $.parseJSON(response);
        if(data['success']){
            setTimeout(function(){
              location.reload();

            },0.5);

             new PNotify({
                title: 'Updated',
                text: data['msg'],
                addclass: 'bg-success'
            });

        }
        if(data['error']){
            new PNotify({
                title: 'Updated',
                text: data['msg'],
                addclass: 'bg-danger'
            });
        }
      }
    });
});


$('.dltBtn').on('click',function () {
      var d_id = $(this).data('id');
      swal({
            title: "Are you sure?",
            text: "You want to delete this data!",
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
              $.ajax({
                  url: '<?php echo site_url('accounts/ledgers/dltGroup')?>'+'/'+d_id,
                  success:function (response) {
                    var data = $.parseJSON(response);
                        if(data['success']){

                            swal({
                        title: "Deleted!",
                        text: "Data has been deleted.",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                      });
                        setTimeout(function(){
                          location.reload();
                       },1000);
                    }  
                    if(data['error']){
                              swal({
                          title: "Oops...",
                          text: "Something went wrong!",
                          confirmButtonColor: "#EF5350",
                          type: "error"
                      });
                    }     
                  }
                });
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your Data is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
}); 

</script>
</body>
</html>




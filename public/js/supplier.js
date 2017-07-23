$('.BtnSubmit').on('click',function(){
    var date = new Date();
  	createdDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
var post = new Object();
post.companyname = $('#companyName').val();
post.suppliername = $('#supplierName').val();
post.email = $('#email').val();
post.phone = $('.phoneno').map(function() {
   return $(this).val();
}).get();
post.address = $('#address').val();
post.created_on = createdDate;
post.comments = $('#comments').val();
post._token = $('#token').val(); 

var url = '/purchase/supplier/submit';

$.ajax({
  url : url,
  data : post,
  type: 'post',
  success: function(response){
  

  // new PNotify({
  //            title: 'Added',
  //            text: 'The Supplier has been added successfully.',
  //            addclass: 'bg-success'

  //        });
    window.setTimeout(function(){window.location.reload();},100)
   
}

});
});
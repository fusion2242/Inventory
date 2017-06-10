 

 
$('#submitBtn').on('click',function(){
      var date = new Date();
  	createdDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
 var customer = new Object();
    customer.id = $('#id').val();
    customer.name= $('#c_name').val();
    customer.phone = $('#phone').val(); 
    customer.email = $('#email').val(); 
   
    customer.address = $('#address').val(); 
    customer.date = createdDate;
    customer.comments = $('#comments').val();
    customer._token = $('#token').val(); 
    var url = "/customer";
if ($('#id').val().length > 0 || $('#c_name').val().length > 0 ) {
     $.ajax({
        url: url,
        data: customer,
        type: 'post',
        success: function(response){
        window.setTimeout(function(){window.location.reload();},100)
    $('#id').val("");
 $('#c_name').val("");
 $('#email').val("");
 $('#phone').val("");
 $('#percent').val("");

 $('#address').val("");                       
                    }
}); 
}else{
$('.div').show();
setTimeout(function(){$('.div').fadeOut(500);},
        2000);

// $('.customer_name').text('Please Enter Customer Name');
}




   
  
});

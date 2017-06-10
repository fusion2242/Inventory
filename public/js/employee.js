$('.submit').on('click',function(){
     var date = new Date();
  	createdDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
   var employee = new Object();
   employee.name = $('#name').val();
   employee.username = $('#username').val();
   employee.email = $('#email').val();
   employee.pass = $('#pass').val();
   employee.re_pass = $('#re_pass').val();
   employee.emp_type = $('#emp_type').val();
   employee.phone = $('#phone').val();
   employee.created_on = createdDate;
   employee.comments = $('#comment').val();
   employee._token = $('#token').val();

   var url = "/employee";
   $.ajax({  

          url: url,
          data: employee,
          type:'post',
          success: function(response){
             window.setTimeout(function(){window.location.reload();},100)
            // setTimeout(function(){
            //   location.href= "/employee";
            // },2000);

          }



   });

});
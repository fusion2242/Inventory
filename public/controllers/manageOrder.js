var app = angular.module('manage',[]);
app.controller('manageOrder', function($scope,$http,$timeout){
 var date = new Date();
  	createdDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);

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
          
          getData(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
        }
    );
$scope.orders = [];
$scope.orderItems = [];
$scope.customers = [];
$scope.selectedId;
$scope.iDate = createdDate;
$scope.progress = false;
$scope.progressRate = 0;
$scope.successMsg;
$scope.returnedId;
var getData = function(start,end){
    $http.get('/order/getOrders/'+start+"/"+end).then(function(response){
    $scope.orders = response.data;
}) 
}
$scope.showItems = function(id){
    $http.get('/order/getOrderItems/'+id).then(function(response){
            $scope.orderItems = response.data;
    });
    $('#orderItemsModal').modal('toggle');

}
$scope.invoiceModal = function(id){
    $scope.selectedId = id;
    $scope.customers = [];
    $scope.progress = false;
    $('#invoice-modal').modal('toggle');
}
$scope.getTypes = function(){

  if($scope.buyertype == '2'){
     $http.get('/order/getBuyerType/2').then(function(response){
        $scope.customers = response.data;
     });
  }else if($scope.buyertype == '1'){
        $http.get('/order/getBuyerType/1').then(function(response){
            $scope.customers = response.data;
        });
  }

}
$scope.deleteOrder = function(id,index){
    $http.get('/order/deleteOrder/'+id).then(function(response){
            if(response.data.hasOwnProperty('success')){
                    $scope.orders.splice(index,1);
            }
    });
}
$scope.changeStatus = function(id,status,index){
   if(status == '1'){
    $scope.orders[index].status = 0;
    $http.get('/order/changeOrderStatus/'+id+'/'+'0');
}else{
    $scope.orders[index].status = 1;
     $http.get('/order/changeOrderStatus/'+id+'/'+'1');
}
}
$scope.getEmployee = function(id,index){
    if(id == null){
        return 'General Sale';
    }else{
        return $scope.orders[index].employee_name;
    }
}
$scope.generateInvoice = function(){
    if($scope.customers.length == 0){
        alert('Select a recipient first');
    }else{
        $scope.iDate = $('#datepicker').val();
          var data = $.param({
              type: $scope.buyertype,
              order_id: $scope.selectedId,
              buyer_id: $scope.buyerId,
              status: $scope.iStatus,
              paymentType : $scope.paymentType,
              created: $scope.iDate,
                });
                $http({
                    url: '/order/generateInvoice',
                    data: data,
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                }).then(function(response){
                //     $scope.progress = true;
                    
                //     if($scope.progressRate != parseInt(100)){
                //         $timeout(function(){
                //             rate += 1;
                //         },500);
                //     }

                    var data = response.data;
                    if(data.hasOwnProperty('success')){
                            $scope.progress = true;
                            $scope.successMsg = data.msg;
                            $scope.returnedId = data.id;
                    }

                 })



    }
    
}

});
var app = angular.module('mInvoice',[]);

app.controller('invoice',function($scope,$http){
$scope.buyerType;
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
          
          getData($scope.buyerType,start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
        }
    );



$scope.invoices = [];

var getData = function(type,start,end){
    if(angular.isUndefined($scope.buyerType)){
        alert('select buyer type');
    }else{
            $http.get('/order/getInvoices/'+type+"/"+start+"/"+end).then(function(response){
            $scope.invoices = response.data;
            });
    }



}

$scope.removeInvoice = function(id,index){
    $http.get('/order/deleteInvoice/'+id).then(function(response){
        if(response.data.hasOwnProperty('success')){
            alert(response.data.msg);
            $scope.invoices.splice(index,1);
        }
    });
}
$scope.changeStatus = function(id,status,index){
if(status == '1'){
    $scope.invoices[index].invoiceStatus = 2;
    $http.get('/order/changeInvoiceStatus/'+id+'/'+'2');
}else{
    $scope.invoices[index].invoiceStatus = 1;
     $http.get('/order/changeInvoiceStatus/'+id+'/'+'1');
}
}
});
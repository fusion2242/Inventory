var app = angular.module('purchaseHistory', ['blockUI']);


app.controller('purchaseCtrl',function($scope,$http,blockUI,$timeout){

var myBlockUI = blockUI.instances.get('myBlockUI');
var myModalBlock = blockUI.instances.get('myModalBlock');
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

$scope.history = [];
$scope.products = [];

 var getData = function(from,to){
     myBlockUI.start('Retrieving purchase history please Wait ...');
     $http.get('/managepurchase/purchase/getPurchaseHistory/'+from+"/"+to).then(function(response){
            $scope.history = response.data;
            myBlockUI.stop();
     });
//    $timeout(function(){
//         myBlockUI.stop();
//     },2000);
 } 

$scope.getProducts = function(id){
     $('#myModal').modal('toggle');
     myModalBlock.start('Retrieving purchase order products ...');
     $http.get('/managepurchase/purchase/getPurchaseProducts/'+id).then(function(response){
            $scope.products = response.data;
            myModalBlock.stop();
     });
    
}
});
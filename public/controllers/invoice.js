var app = angular.module('invoice',['ngPrint']);

app.controller('inv',function($scope,$http){
$scope.id = $('#id').val();
console.log($scope.id);
$scope.invoice = [];
$scope.order = [];
$scope.products = [];
$scope.buyer = [];

$http.get('/order/getInvoiceItems/'+$scope.id).then(function(response){
    $scope.invoice = response.data.invoice;
    $scope.order = response.data.order;
    $scope.products = response.data.products;
    console.log($scope.products);
    $scope.buyer = response.data.buyer;
});

$scope.print = function(){
    $("html").print({
        	noPrintSelector: ".no-print",
        	
	});
}

});
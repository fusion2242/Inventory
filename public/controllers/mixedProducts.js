var app = angular.module('mixedProducts', ['blockUI']);


app.controller('mixedProductsCtrl',function($scope,$http,blockUI,$timeout){

var myBlockUI = blockUI.instances.get('myBlockUI');
var myModalBlock = blockUI.instances.get('myModalBlock');


$scope.products = [];
$scope.resources = [];


     myBlockUI.start('Retrieving mixed products please Wait ...');
     $http.get('/mixing/getMixedProducts').then(function(response){
            $scope.products = response.data;
            myBlockUI.stop();
     });
//    $timeout(function(){
//         myBlockUI.stop();
//     },2000);
 

$scope.getResources = function(id){
     $('#myModal').modal('toggle');
     myModalBlock.start('Retrieving purchase order products ...');
     $http.get('/mixing/getMixedProductsResources/'+id).then(function(response){
            $scope.resources = response.data;
            myModalBlock.stop();
     });
    
}

$scope.deleteProduct = function(id,index){
     $http.get('/mixing/delete/'+id).then(function(response){
            $scope.products.splice(index,1);
     });
}
});
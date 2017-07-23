
var app = angular.module('newPurchase',[]);

app.controller('products', function($rootScope,$scope,$http){

$rootScope.products = [];
$scope.selectedName;
$rootScope.selectedProducts = [];
$scope.quantity = [];
$scope.price = [];
$scope.grandtotal = 0;
$scope.total = [];
$scope.selectedprod = [];
$scope.reference;
$scope.frieght = 0;
//$scope.items = [];
var date = new Date();
	$scope.cDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
// $http.get('/getAllProducts').then(function(response){
//      $scope.products =  response.data;
// });
$http.get('/getSupplier').then(function(response){
     $scope.names =  response.data;
     
});

$scope.getProductsBySupplier = function(item){
	$http.get('/managepurchase/purchase/getProductBySupplier/'+item).then(function(response){
		var data = response.data
	//	console.log(response);
		$rootScope.products = data;
	});
}

$scope.addToCart = function(id, item) {
	let itemID = parseInt(id);
	let index = $rootScope.selectedProducts.indexOf(itemID);
	let ind =  $rootScope.products.indexOf(itemID);

	if(parseInt(index) < 0) {
		$rootScope.selectedProducts.push(item);
		$rootScope.products.splice(ind,1);
	}
}

$scope.getTotal = function(index){
	//console.log($scope.total);
	let quantity = $scope.quantity[index];
	let price = $scope.price[index];
	let total = quantity * price;
//	console.log(total);
	if(isNaN(total)){
      return  '0'; 
	} else{
		return total;
		
	}
	
	
	//console.log("scope.price[index]");

}
$scope.removePoRow = function(index){
	$rootScope.selectedProducts.splice(index,1);
}

$scope.$watchCollection("total", function() {
	 	if ($scope.total.length > 0) {
	 		 var total = $scope.total.reduce((p,c) => parseInt(p) + parseInt(c));
			  $scope.grandtotal = total;
			//  console.log($scope.total+" "+$scope.grandtotal);
	 	}else{
	 		$scope.grandtotal = 0;
    	
	 	}		
	 },true);
	 

$scope.savePurchases = function(){
	var data = $.param({
        supplier_id : $scope.selectedName,
        grand_total : $scope.grandtotal,
        created : $scope.cDate,
		reference: $scope.reference,
		product_code: $scope.selectedprod,
		quantity : $scope.quantity,
		unit_price: $scope.price,
		total : $scope.total,
		reference: $scope.reference,
		frieght: $scope.frieght
      });
    $http({
    url: '/managepurchase/purchase/addNewPurchases',
    method: "POST",
    data: data,
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(function(response){
		alert('Purchase Order Added');
		  window.setTimeout(function(){window.location.reload();},1000);

     });
}
});
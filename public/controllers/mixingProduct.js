var app = angular.module('mixingProduct',[]);


app.controller('mixingCtrl',function($scope,$http){
    var date = new Date();
	$scope.Date = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
$scope.products = [];
$scope.productCode = [];
$scope.quantity = [];
$scope.productsFields = [{id: 'input'}];
$scope.inputNo = 0;
$scope.addProduct = function(){
    var newProduct = {id: 'input-'+$scope.inputNo};
    $scope.inputNo += 1;
    $scope.productsFields.push(newProduct);
}
$scope.removeProduct = function(index,pcode,quantity){
    $scope.productsFields.splice(index,1);
    var pindex = $scope.productCode.indexOf(pcode);
    $scope.productCode.splice(pindex,1);
    var qindex = $scope.quantity.indexOf(quantity);
    $scope.quantity.splice(qindex,1);


}
$http.get('/mixing/getProducts').then(function(response){
$scope.products = response.data;
});
$scope.$watchCollection("quantity", function() {
	 	if ($scope.quantity.length > 0) {
	 		 $scope.quantityTotal = $scope.quantity.reduce((p,c) => parseInt(p) + parseInt(c));
			//  console.log($scope.total+" "+$scope.grandtotal);
	 	}else{
	 		$scope.quantityTotal = 0;
    	
	 	}		
	 },true);

$scope.saveMixed = function(){
    var data = $.param({
        name: $scope.name,
        quantity: $scope.quantityTotal,
        price: $scope.price,
        product_code: $scope.productCode,
        product_quantity: $scope.quantity,
        created_on: $scope.Date
    });

   $http({
    url: '/mixing/saveMixedProduct',
    method: "POST",
    data: data,
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(function(response){
		alert('Mixed Product Added');

     });

}


});
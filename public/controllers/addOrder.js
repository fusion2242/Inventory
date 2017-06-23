var app = angular.module('addOrder',[]);

app.controller('add',function($scope,$http){

$scope.types = [{id: 1, type: 'General'},{id: 2, type: 'Mixed'}]; 
$scope.products = [];
$scope.type = [];
$scope.unitPrice = [];
$scope.product = [];
$scope.quantity = [];
$scope.total = [];
$scope.showPlus = [];
$scope.employees = [];
$scope.originQ = [];
$scope.comission = 0;
$scope.is_commisioned = false;
$scope.orderNo = Math.floor((Math.random() * 999999) + 1);
$http.get('/order/getOrderByType/').then(function(response){
$scope.products = response.data;
});
$scope.fields = [{class: 'input'}];
$scope.addField = function(){
    var no = 0;
    var newF = {class: 'input'+no};
    no += 1;
    $scope.fields.push(newF);
}
$scope.removeFields = function(index){
    $scope.unitPrice[index] = '';
    $scope.product[index] = '';
    $scope.type[index] = '';
    $scope.quantity[index] = '';
    $scope.total[index] = 0;
    $scope.fields.splice(index,1);
}

$scope.getPrice = function(index){
 
   var id = $scope.product[index];
   $http.get('/order/getPriceByType/'+id).then(function(response){
$scope.unitPrice[index] = response.data.selling_price;
$scope.originQ[index] = response.data.product_quantity; 
});

}
$scope.getTotal = function(index){
   var total = $scope.quantity[index] * $scope.unitPrice[index];
   if(isNaN(total)){
       return 0;
   }else{
       return total;
   }
}
$scope.checkQuantity = function(index){
  if(angular.isUndefined($scope.product[index])){
        alert('select product first');
    }else{
    if(parseInt($scope.quantity[index]) > parseInt($scope.originQ[index])){
        //alert('Quantity entered is greater than the available stock i.e '+$scope.originQ[index]);
        $('.quantity-'+index).css({'border-color' : 'red','border-style' : 'inherit'});
        $('.quantity-'+index).popover({
            title: 'Quantity Error',
            content : 'Quantity entered is greater than the available stock i.e '+$scope.originQ[index],
        });
        $('.quantity-'+index).popover('toggle');
        $scope.showPlus[index] = true;

    }else{
        $('.quantity-'+index).css({'border-color' : 'black'});
        $('.quantity-'+index).popover('destroy');
        $scope.showPlus[index] = false;
    }
    }
}
$scope.$watchCollection("total", function() {
	 	if ($scope.total.length > 0) {
	 		 $scope.subTotal = $scope.total.reduce((p,c) => parseInt(p) + parseInt(c));
			//  console.log($scope.total+" "+$scope.grandtotal);
	 	}else{
	 		$scope.subTotal = 0;
    	
	 	}		
	 },true);
$scope.openModal = function(){
    $('#commisonModal').modal('toggle');
    $http.get('/order/getEmployees').then(function(response){
        $scope.employees = response.data;
    });
}
$scope.add = function(){
    $('#commisonModal').modal('toggle');
    $scope.is_commisioned = true;
}
$scope.submitOrder = function(){
    if($scope.is_commisioned){
         var data = $.param({
        productId : $scope.product,
        quantity : $scope.quantity,
        unitPrice: $scope.unitPrice,
        total : $scope.total,
        orderNo : $scope.orderNo,
        grandTotal: $scope.subTotal,
        commTo: $scope.employee,
        commAmount: $scope.comission,
        is_commisioned : $scope.is_commisioned
    });
    }else{
        var data = $.param({
        productId : $scope.product,
        quantity : $scope.quantity,
        unitPrice: $scope.unitPrice,
        total : $scope.total,
        orderNo : $scope.orderNo,
        grandTotal: $scope.subTotal,
       
    });
    }
    
    $http({
        url: '/order/addOrder',
         data: data, 
         method: 'POST', 
         headers: {'Content-Type' : 'application/x-www-form-urlencoded'}})
    .then(function(response){
        console.log(response.data);
    });
}
});
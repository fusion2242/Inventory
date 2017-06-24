var app = angular.module('addOrder',[]);

app.controller('add',function($scope,$http){

$scope.types = [{id: 1, type: 'General'},{id: 2, type: 'Mixed'}]; 
$scope.products = [];
$scope.type = [];
$scope.unitPrice = [];
$scope.showPlus = [];
$scope.product = [];
$scope.quantity = [];
$scope.total = [];
$scope.submitBtn = false;
$scope.employees = [];
$scope.comission = 0;
$scope.originQ = [];
$scope.is_commisioned = false;
$scope.orderNo = Math.floor((Math.random() * 999999) + 1);
$http.get('/order/getMixedProducts/').then(function(response){
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
    $scope.unitPrice.splice(index,1);
    $scope.product.splice(index,1);
    $scope.type.splice(index,1);
    $scope.quantity.splice(index,1);
    $scope.total.splice(index,1);
    $scope.fields.splice(index,1);
}

$scope.getPrice = function(index){
 
   var id = $scope.product[index];
   $http.get('/order/getPriceByMixed/'+id).then(function(response){
$scope.unitPrice[index] = response.data.selling_price;
$scope.originQ[index] = response.data.quantity; 

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
        $scope.submitBtn = true;

    }else{
        $('.quantity-'+index).css({'border-color' : 'black'});
        $('.quantity-'+index).popover('destroy');
        $scope.showPlus[index] = false;
        $scope.submitBtn = false;
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
        is_commisioned : $scope.is_commisioned,
        is_mixed : 1
    });
    }else{
        var data = $.param({
        productId : $scope.product,
        quantity : $scope.quantity,
        unitPrice: $scope.unitPrice,
        total : $scope.total,
        orderNo : $scope.orderNo,
        grandTotal: $scope.subTotal,
        is_mixed : 1
       
    });
    }
    
    $http({
        url: '/order/addOrder',
         data: data, 
         method: 'POST', 
         headers: {'Content-Type' : 'application/x-www-form-urlencoded'}})
    .then(function(response){
         if(response.data.hasOwnProperty('success')){
            alert(response.data.msg);
           $window.location.reload();
        }
    });
}
});
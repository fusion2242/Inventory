var app = angular.module('damage',[]);

app.controller('dmg',function($scope,$http){

$scope.products = [];
$scope.damageQ = [];
$scope.damageNote = [];
$scope.rQuantity = [];

$http.get('/product/getProducts').then(function(response){
$scope.products = response.data;

});

$scope.addDamage = function(index,id){
    var quantity = $scope.damageQ[index];
    var note = $scope.damageNote[index];
    if(quantity > $scope.rQuantity[index]){
        alert('Damaged Quantity cannot be larger than the available stock');
    }else if(angular.isUndefined($scope.damageQ[index])){
        alert('Enter damage quantity');
    }else{
        $http.get('/product/addDamageProduct/'+id+"/"+quantity+"/"+encodeURI(note)).then(function(response){
            var indexProducts = $scope.products.map(function(el) {
            return el.id;
        }).indexOf(id);
        $scope.products[indexProducts].product_quantity = response.data.product_quantity;
        $scope.damageQ[index] = response.data.damage;

        });
        
        
    }
   
}
});
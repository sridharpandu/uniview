angular.module('MetronicApp').controller('newPurchaseOrderController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$scope.disabled=$rootScope.disabled;
ComponentsDateTimePickers.init();

$state.params.purchase
console.log($state.params.purchase);
    if($state.params.purchase){
    $scope.newpurchasedetails =true;
    $scope.viewpurchasedetails=false;
    } else {
    $scope.newpurchasedetails =false;
    $scope.viewpurchasedetails=true;
    }


$scope.proforma=[
	{
 		"itemDetails":"",
 		"quality":""  ,
 		"rate":"",
 		"tax":"",
 		"amount":"" 
	}
	
];

$scope.newrow=function(){
	$scope.proforma.push({

                            "tax":"",
                           " QUANTITY":"",
                           "items":"",
                              "rate" :"",
                              "amount":"",
                              "action":"",
                          });
}


$scope.deleteRow=function(index){
	$scope.proforma.splice(index, 1);

}

$scope.exit=function(){
	$state.go('purchageorder')
}

});
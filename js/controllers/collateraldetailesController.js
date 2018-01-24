angular.module('MetronicApp').controller('collateraldetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formCollateral=false;
 
$scope.newCollateral=function(){
   $state.go('cvCollateral')

};



$scope.collateral=[
	{
 		"id":"001",
 		"name":"Property"   
	},
	{
		"id":"002",
		"name":"Cash Secured Loan" 
	},
	{
    	"id":"003",
    	"name":"Inventory Financing"

	},
	{
		"id":"004",
		"name":"Invoice Collateral"
	},
	{
		"id":"005",
		"name":"Blanket Liens"
	}
];

$scope.viewCollateral=function(){
  $state.go('cvCollateral') 
}




});
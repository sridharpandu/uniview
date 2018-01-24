angular.module('MetronicApp').controller('currencydetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formCurrency=false;
 
$scope.newCurrency=function(){
    $state.go('cvCurrency')

};


$scope.currency=[
	{
 		"id":"001",
 		"name":"Rupee"   
	},
	{
		"id":"002",
		"name":"Dollar" 
	},
	{
    	"id":"003",
    	"name":"Yen"

	},
	{
		"id":"004",
		"name":"Pounds"
	},
	{
		"id":"005",
		"name":"Rubie"
	},
	{
		"id":"006",
		"name":"Euro"
	},
	{
		"id":"007",
		"name":"Colon"
	}
];

$scope.viewCurrency=function(){
   $state.go('cvCurrency') 
}




});
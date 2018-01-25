angular.module('MetronicApp').controller('taxstatusdetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formTaxStatus=false;
 
$scope.newTaxStatus=function(){
    $state.go('cvTaxStatus')

};


$scope.taxstatus=[
	{
 		"id":"001",
 		"name":"Admin"   
	},
	{
		"id":"002",
		"name":"Customer Supplier" 
	},
	{
    	"id":"003",
    	"name":"Bank Manager"

	},
	{
		"id":"004",
		"name":"Bank Tellar"
	},
	{
		"id":"005",
		"name":"Finanical Manager"
	},
	{
		"id":"006",
		"name":"Loan Officer"
	},
	{
		"id":"007",
		"name":"Documentb Verification Unit"
	}
];

$scope.viewTaxStatus=function(){
   $state.go('cvTaxStatus')  
}




});
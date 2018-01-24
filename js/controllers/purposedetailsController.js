angular.module('MetronicApp').controller('purposedetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formPurpose=false;
 
$scope.newPurpose=function(){
   $state.go('cvPurpose')

};


$scope.purpose=[
	{
 		"id":"001",
 		"name":"Saving"   
	},
	{
		"id":"002",
		"name":"Repayment Of Loan" 
	},
	{
    	"id":"003",
    	"name":"Business Collection Of Instruction"

	},
	{
		"id":"004",
		"name":"Other"
	}
];

$scope.viewPurpose=function(){
   $state.go('cvPurpose') 
}




});
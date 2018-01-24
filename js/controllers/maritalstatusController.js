angular.module('MetronicApp').controller('maritalstatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formMaritalStatus=false;
 
$scope.newMaritalStatus=function(){
    $state.go('cvMaritalStatus')

};


$scope.maritalstatus=[
	{
 		"id":"001",
 		"name":"None"   
	},
	{
		"id":"002",
		"name":"Married" 
	},
	{
    	"id":"003",
    	"name":"Divorced"

	},
	{
		"id":"004",
		"name":"Widow"
	},
	{
		"id":"005",
		"name":"Seperated"
	}
];

$scope.viewMaritalStatus=function(){
   $state.go('cvMaritalStatus') 
}




});
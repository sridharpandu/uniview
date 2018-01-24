angular.module('MetronicApp').controller('salutationdetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formSalutation=false;
 
$scope.newSalutation=function(){
    $state.go('cvSalutation')

};


$scope.salutation=[
	{
 		"id":"001",
 		"name":"MR."   
	},
	{
		"id":"002",
		"name":"M/S." 
	},
	{
    	"id":"003",
    	"name":"DR."

	},
	{
		"id":"004",
		"name":"MASTER."
	},
	{
		"id":"005",
		"name":"SHR."
	},
	{
		"id":"006",
		"name":"SMT."
	},
	{
		"id":"007",
		"name":"JUSTICE"
	}
];

$scope.viewSalutation=function(){
   $state.go('cvSalutation') 
}




});
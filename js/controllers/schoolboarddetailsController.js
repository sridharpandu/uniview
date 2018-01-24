angular.module('MetronicApp').controller('schoolboarddetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formSchoolBoard=false;
 
$scope.newSchoolBoard=function(){
    $state.go('cvSchoolBoard')

};


$scope.schoolboard=[
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

$scope.viewSchoolBoard=function(){
  $state.go('cvSchoolBoard')  
}




});
angular.module('MetronicApp').controller('religiondetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formReligion=false;
 
$scope.newReligion=function(){
    $state.go('cvReligion')

};


$scope.religion=[
	{
 		"id":"001",
 		"name":"Hindu"   
	},
	{
		"id":"002",
		"name":"Christan" 
	},
	{
    	"id":"003",
    	"name":"Muslim"

	},
	{
		"id":"004",
		"name":"Other"
	}
];

$scope.viewReligion=function(){
  $state.go('cvReligion')
}




});
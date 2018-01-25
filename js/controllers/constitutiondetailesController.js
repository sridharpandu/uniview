 angular.module('MetronicApp').controller('constitutiondetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formConstitution=false;
 
$scope.newRole=function(){
    $state.go('cvConstitution')

};


$scope.constitution=[
	{
 		"id":"001",
 		"name":"Private"   
	},
	{
		"id":"002",
		"name":"Public Sector Bank" 
	},
	{
    	"id":"003",
    	"name":"LLP"

	},
	{
		"id":"004",
		"name":"Partnership"
	},
	{
		"id":"005",
		"name":"Individual"
	},
	{
		"id":"006",
		"name":"Association/Club"
	},
	{
		"id":"007",
		"name":"Foreigners"
	}
];

$scope.viewConstitution=function(){
  $state.go('cvConstitution') 
}




});
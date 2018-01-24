angular.module('MetronicApp').controller('proformaInoviceController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$scope.proformaNumber=[
{
	sno:"001",
    id: "12073654"
},
{
	sno:"002",
    id: "0073654"
},
{
	sno:"003",
    id: "127993654"
}
];

$scope.viewProformaConstitution=function(){
	$state.go('newProformaOrder')
	$scope.viewdetails=true;
	

}
});
angular.module('MetronicApp').controller('cvTaxStatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('taxstatus')
}
});
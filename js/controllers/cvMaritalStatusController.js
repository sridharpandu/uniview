angular.module('MetronicApp').controller('cvMaritalStatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();

$scope.exit=function(){
	$state.go('maritalstatus')
}
});
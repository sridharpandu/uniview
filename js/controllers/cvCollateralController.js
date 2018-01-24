angular.module('MetronicApp').controller('cvCollateralController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('collateral')
}
});
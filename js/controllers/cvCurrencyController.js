angular.module('MetronicApp').controller('cvCurrencyController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('currency')
}
});
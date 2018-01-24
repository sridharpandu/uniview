angular.module('MetronicApp').controller('cvPurposeController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('purpose')
}

});
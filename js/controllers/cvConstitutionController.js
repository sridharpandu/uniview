angular.module('MetronicApp').controller('cvConstitutionController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('constitution')
}
});	
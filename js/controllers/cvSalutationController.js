angular.module('MetronicApp').controller('cvSalutationController', function(config, $rootScope, $scope, $http, $timeout, $location,$state){

$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('salutation')
}

});
angular.module('MetronicApp').controller('cvReligionController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('religion')
}

});
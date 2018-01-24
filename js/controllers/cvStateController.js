angular.module('MetronicApp').controller('cvStateController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('state')
}

$state.params.module
console.log($state.params.module);
		if($state.params.module)
		{
		$scope.saveState =true;
		$scope.editState=false;
		}
		else
		{
		$scope.saveState =false;
		$scope.editState=true;
		}

$scope.stateID= $rootScope.Statecode;
$scope.stateName=$rootScope.Statename;

$scope.option=$rootScope.Status;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-statetext').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-statetext').bootstrapSwitch('state', false);   
}

$('.alert-statetext').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
             $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createState=function(stateName,option){

	$http({
    method : 'GET',
    url    : 'http://park.sastratechnologies.biz/service/insertstate?statename='+ stateName  + '& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('state')
    toastr.success(data.Insertstate);
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.updateState=function(stateName,option){
//console.log(countryCode,option);
    $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/insertstate? statename='+ stateName +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('state')
    toastr.success(data.InsertState);
   
    $rootScope.Status=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}

});
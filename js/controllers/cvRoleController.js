angular.module('MetronicApp').controller('cvRoleController', function(config, $rootScope, $scope, $http, $timeout, $location,$state,$stateParams) {
 $("[name='makeSwitch']").bootstrapSwitch();
$scope.exit=function(){
	$state.go('roles')
}

$state.params.mode
console.log($state.params.mode);
		if($state.params.mode)
		{
		$scope.createRoles =true;
		$scope.editRoles=false;
		}
		else
		{
		$scope.createRoles =false;
		$scope.editRoles=true;
		}

$scope.roleID= $rootScope.rolesId;
$scope.roleName=$rootScope.role_description;
$scope.code=$rootScope.pnemonic;
//console.log($scope.roleID);
$scope.option=$rootScope.Status;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-roletext').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-roletext').bootstrapSwitch('state', false);   
}

$('.alert-roletext').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
             $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createRole=function(roleName,roleName,option){

	$http({
    method : 'GET',
    url    : 'http://park.sastratechnologies.biz/service/updaterole?rolepnemonic='+ roleName +'&roledescription=' + roleName + '& rolestatus=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('roles')
    toastr.success(data.InsertRole);
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.updateRole=function(roleName,option){
//console.log(countryCode,option);
    $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/updaterole? roledescription='+ roleName +'& rolestatus=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('roles')
    toastr.success(data.UpdateRole);
   
    $rootScope.Status=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}
});
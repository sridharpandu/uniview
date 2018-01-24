angular.module('MetronicApp').controller('roledetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formRoles=false;
    
//Get Role Api
$scope.getRoles=function(){
    
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/role',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.roles=data.role;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getRoles();

//Save Role Api
$scope.newRole=function(){
	
	$rootScope.rolesId="";
	$rootScope.role_description="";
    $rootScope.Status="";
	$scope.createRoles=true;
    $state.go('cvRole',{mode:$scope.createRoles});

};



//Edit Role Api
$scope.view=function(roleId,role_description,roleStatus,role_Pnemonic){
	
	 $rootScope.rolesId=roleId;
	  $rootScope.role_description=role_description;
	  //$rootScope.code=option;
	  $rootScope.pnemonic=role_Pnemonic;
     $rootScope.Status=roleStatus;
   	  $state.go('cvRole')

}




});
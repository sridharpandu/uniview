angular.module('MetronicApp').controller('userDetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formUser=false;
 
$scope.newUser=function(){
	$rootScope.UserID="";
	$rootScope.Username="";
   $rootScope.Status="";
  $scope.userSave=true;
    $state.go('cvUser',{user:$scope.userSave})

};


$scope.getUser=function(){
    
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/displayuser',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.user=data.users;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getUser();
$scope.viewUser=function(UserID,Username,Status){
	$rootScope.UserID=UserID;
	  $rootScope.Username=Username;
    $rootScope.Status=Status;
   $state.go('cvUser')
}




});
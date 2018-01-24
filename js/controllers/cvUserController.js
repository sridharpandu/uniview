angular.module('MetronicApp').controller('cvUserController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {


$("[name='makeSwitch']").bootstrapSwitch();
$state.params.user
console.log($state.params.user);
		if($state.params.user)
		{
		$scope.userSave =true;
		$scope.userUpdate=false;
		}
		else
		{
		$scope.userSave =false;
		$scope.userUpdate=true;
		}

$scope.exit=function(){
	$state.go('userDetails')
}

//$scope.option='';
$scope.userID= $rootScope.UserID;
$scope.userNames=$rootScope.Username;
$scope.option=$rootScope.Status;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-usertext').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-usertext').bootstrapSwitch('state', false);   
}

$('.alert-usertext').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
        	 $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createUser=function(userNames,option){

	$http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/insertuser? username='+ userNames +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('userDetails')
    toastr.success(data.Insertuser);
    
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.updateUser=function(userNames,option){
//console.log(countryCode,option);
	$http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/insertuser? username='+ userNames +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('userDetails')
    toastr.success(data.UpdateUser);
   
	  $rootScope.Status=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}

});
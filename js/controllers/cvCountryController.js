angular.module('MetronicApp').controller('cvCountryController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();
$state.params.update
console.log($state.params.update);
		if($state.params.update)
		{
		$scope.countrySave =true;
		$scope.countryUpdate=false;
		}
		else
		{
		$scope.countrySave =false;
		$scope.countryUpdate=true;
		}
$scope.exit=function(){
	$state.go('country')
}

$scope.option='';

$scope.countryCode= $rootScope.countryCode;
$scope.countryRoleName=$rootScope.countryDescription;
$scope.countryTelephone=$rootScope.PhoneCode;
$scope.option=$rootScope.countrystatus;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-status').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-status').bootstrapSwitch('state', false);   
}

$('.alert-status').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
        	 $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createCountry=function(countryCode,countryRoleName,countryTelephone,option){

	$http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/insertnationality? countrycode='+ countryCode +'&countryname='+countryRoleName+'& phonecode='+countryTelephone+'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('country')
    toastr.success(data.InsertNationality);
    
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.updateCountry=function(countryCode,option){
console.log(countryCode,option);
	$http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/insertnationality? countrycode='+ countryCode +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('country')
    toastr.success(data.UpdateNationality);
   
	  $rootScope.countrystatus=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}

});
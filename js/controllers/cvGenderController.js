angular.module('MetronicApp').controller('cvGenderController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();

$scope.exit=function(){
	$state.go('gender')
}
$state.params.gendertext
console.log($state.params.gendertext);
		if($state.params.gendertext)
		{
		$scope.genderSave =true;
		$scope.genderUpdate=false;
		}
		else
		{
		$scope.genderSave =false;
		$scope.genderUpdate=true;
		}

$scope.genderID= $rootScope.GenderID;
$scope.genderName=$rootScope.gendername;
$scope.option=$rootScope.Status;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-genderstatus').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-genderstatus').bootstrapSwitch('state', false);   
}

$('.alert-genderstatus').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
             $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createGender=function(genderName, option){

	$http({
    method : 'GET',
    url    : 'http://park.sastratechnologies.biz/service/insertgender?gendername='+ genderName + '& genderstatus=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('gender')
    toastr.success(data.InsertGender);
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.updateGender=function(genderName, option){
//console.log(countryCode,option);
    $http({
    method : 'POST',
    url    : 'http://park.sastratechnologies.biz/service/insertgender? gendername='+ genderName +'& genderstatus=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('gender')
    toastr.success(data.UpdateGender);
   
    $rootScope.Status=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}
});
angular.module('MetronicApp').controller('cvBusinessTypeController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();

$state.params.type
console.log($state.params.type);
		if($state.params.type)
		{
		$scope.businessSave =true;
		$scope.businessUpdate=false;
		}
		else
		{
		$scope.businessSave =false;
		$scope.businessUpdate=true;
		}
$scope.exit=function(){
	$state.go('businesstype')
}


$scope.leadsID= $rootScope.leadID;
$scope.businessTyper=$rootScope.bussinessType;
$scope.option=$rootScope.Status;
console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.alert-businesstypestatus').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.alert-businesstypestatus').bootstrapSwitch('state', false);   
}

$('.alert-businesstypestatus').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
             $scope.option = "true";
            console.log($scope.option);
        }
    });
$scope.createBusinessType=function(businessTyper,option){

	$http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/insertbusinesstype? businesstype='+ businessTyper +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('businesstype')
    toastr.success(data.businesstype);
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.updateBusinessType=function(businessTyper,option){
//console.log(countryCode,option);
    $http({
    method : 'POST',
    url    : 'http://park.sastratechnologies.biz/service/insertbusinesstype? businesstype='+ businessTyper +'& status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $state.go('businesstype')
    toastr.success(data.Updatebusinesstype);
   
    $rootScope.Status=data.Status;
   })
   .error(function(data){
        console.log(data);
    });

}
});
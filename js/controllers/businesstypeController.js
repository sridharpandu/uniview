angular.module('MetronicApp').controller('businesstypeController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formBusinessType=false;
 
$scope.newBusinessType=function(){
	$rootScope.leadID="";
	$rootScope.bussinessType="";
  $rootScope.Status="";
  $scope.businessSave =true;
    $state.go('cvBusinessType',{type:$scope.businessSave});

};


$scope.getBusinessType=function(){
    
   $http({
    method : 'POST',
    url    : '  http://park.sastratechnologies.biz/service/businesstype',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.businessType=data.BusinessType;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getBusinessType();

$scope.viewBusinessType=function(leadId,bussinessType,Status){
	$rootScope.leadID=leadId;
	  $rootScope.bussinessType=bussinessType;
     $rootScope.Status=Status;
   $state.go('cvBusinessType')
}




});
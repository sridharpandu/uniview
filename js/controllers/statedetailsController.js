angular.module('MetronicApp').controller('statedetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formState=false;
 
$scope.newState=function(){
	 $rootScope.Statecode="";
	  $rootScope.Statename="";
	  
     $rootScope.Status="";
     $scope.saveState=true;
    $state.go('cvState',{module:$scope.saveState})

};


//Get Role Api
$scope.getStates=function(){
    
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/state',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.State=data.State;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getStates();

$scope.viewState=function(Statecode,Statename,Status){
	 $rootScope.Statecode=Statecode;
	  $rootScope.Statename=Statename;
	  
     $rootScope.Status=Status;
   $state.go('cvState')
}




});
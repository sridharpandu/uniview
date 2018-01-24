angular.module('MetronicApp').controller('cvMaritalStatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();
$state.params.core
console.log($state.params.core);
    if($state.params.core){
    $scope.maritalsavebutton =true; 
    $scope.maritalupdatebutton=false;
    } else {
    $scope.maritalsavebutton =false;
    $scope.maritalupdatebutton=true;
    }

$scope.cvmaritalid=$rootScope.maritalidid;
 $scope.cvmaritalvalue=$rootScope.maritalname;
$scope.option=$rootScope.option;
    console.log($scope.option);
if(($scope.option=="true") || ($scope.option==true)){
    console.log($scope.option);
$('.status-button').bootstrapSwitch('state', true);
}else{
        console.log($scope.option);
 $('.status-button').bootstrapSwitch('state', false);   
}

$('.status-button').on('switchChange.bootstrapSwitch', function(e, data) {
        //  alert("gg");
        if (($scope.option=="true") || ($scope.option==true)) {
            $scope.option = "false";
            console.log($scope.option);
        } else {
           $scope.option = "true";
            console.log($scope.option);
        }
    });

  $scope.maritalsave=function(cvmaritalid,cvmaritalvalue,option){
    	
              
  $http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/insertmaritalstatus?maritalstatus='+ cvmaritalvalue + '&status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
   	$state.go('maritalstatus')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}

$scope.maritalupdate=function(cvmaritalid,cvmaritalvalue,option){
      
              
  $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/insertmaritalstatus?maritalstatus='+ cvmaritalvalue + '&status=' + option ,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    $state.go('maritalstatus')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}


$scope.exit=function(){
	$state.go('maritalstatus')
}
$scope.nextView=function(option){

  $scope.option=option;
  console.log("changesdvalues status",$scope.option);
}
});  
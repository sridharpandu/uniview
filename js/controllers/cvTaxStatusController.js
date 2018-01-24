angular.module('MetronicApp').controller('cvTaxStatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();

$state.params.core
console.log($state.params.core);
    if($state.params.core){
    $scope.taxsavebutton =true;
    $scope.taxupdatebutton=false;
    } else {
    $scope.taxsavebutton =false;
    $scope.taxupdatebutton=true; 
    }

 $scope.taxid=$rootScope.taxid;
 // console.log($scope.cvreligionid);

    $scope.taxname=$rootScope.taxname;
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

    $scope.taxsave=function(cvreligionid,cvreligionname,option){
    	
              
  $http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/inserttax?status=' + option + ' &tax=' + cvreligionname,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
   	$state.go('taxstatus')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}

$scope.taxupdate=function(cvreligionname,option){
      
              
  $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/inserttax?tax='+ cvreligionname + '& status=' + option,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    $state.go('taxstatus')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}
$scope.exit=function(){
	$state.go('taxstatus')
}
}); 
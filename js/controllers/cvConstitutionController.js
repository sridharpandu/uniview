angular.module('MetronicApp').controller('cvConstitutionController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
$("[name='makeSwitch']").bootstrapSwitch();

$state.params.core
console.log($state.params.core);
    if($state.params.core){
    $scope.constitutionsavebutton =true;
    $scope.constitutionupdatebutton=false;
    } else {
    $scope.constitutionsavebutton =false;
    $scope.constitutionupdatebutton=true; 
    }

 $scope.constitutionid=$rootScope.constitutionid;
 // console.log($scope.cvreligionid);

    $scope.constitutionname=$rootScope.constitutionname;
    $scope.option=$rootScope.option;
    $scope.type= $rootScope.type;
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

    $scope.constitutionsave=function(cvreligionid,cvreligionname,option,type){
    	
              
  $http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/updateconstitution?constitutiontype='+ type + '&status=' + option + ' &constitutiondesc=' + cvreligionname,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
   	$state.go('constitution')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}

$scope.constitutionupdate=function(cvreligionname,option,type){
      
              
  $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/updateconstitution?constitutiontype='+ type + '& status=' + option,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    $state.go('constitution')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}
$scope.exit=function(){
	$state.go('constitution')
}
});	
angular.module('MetronicApp').controller('cvReligionController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

$("[name='makeSwitch']").bootstrapSwitch();

$state.params.core
console.log($state.params.core);
    if($state.params.core){
    $scope.religionsavebutton =true;
    $scope.religionupdatebutton=false;
    } else {
    $scope.religionsavebutton =false;
    $scope.religionupdatebutton=true; 
    }

 $scope.cvreligionid=$rootScope.religionid;
 // console.log($scope.cvreligionid);

    $scope.cvreligionname=$rootScope.religionname;
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

    $scope.religionsave=function(cvreligionid,cvreligionname,option){
    	
              
  $http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/updatereligion?religiondesc='+ cvreligionid + '&religionstatus=' + option + ' &religion=' + cvreligionname,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
   	$state.go('religion')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}

$scope.religionupdate=function(cvreligionname,option){
      
              
  $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/updatereligion?religion='+ cvreligionname + '&religionstatus=' + option,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    $state.go('religion')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}


$scope.exit=function(){
	$state.go('religion')
}

$scope.nextView=function(option){

  $scope.option=option;
  console.log("changesdvalues status",$scope.option);
}


});  
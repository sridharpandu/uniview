angular.module('MetronicApp').controller('cvSalutationController', function(config, $rootScope, $scope, $http, $timeout, $location,$state){

$("[name='makeSwitch']").bootstrapSwitch();

$state.params.core
console.log($state.params.core);
    if($state.params.core){
    $scope.salutationsavebutton =true;
    $scope.salutationupdatebutton=false;
    } else {
    $scope.salutationsavebutton =false;
    $scope.salutationupdatebutton=true;
    }


 $scope.cvsalutationid=$rootScope.salutationid;
 // console.log($scope.cvreligionid);

    $scope.cvsalutationname=$rootScope.salutationvalue;

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

 $scope.salutationsave=function(cvsalutationid,cvsalutationname,option){
    	
              
  $http({
    method : 'GET',
    url    : ' http://park.sastratechnologies.biz/service/insertsalutation?salutationdesc='+ cvsalutationid + '&status=' + option + ' &salutation=' + cvsalutationname,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
   	$state.go('salutation')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}


$scope.salutationupdate=function(cvsalutationid,cvsalutationname,option){
      
              
  $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/insertsalutation?status=' + option + ' &salutation=' + cvsalutationid,   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    $state.go('salutation')
    
    
   })
   .error(function(data){
        console.log(data);
    });


}


$scope.exit=function(){
	$state.go('salutation') 
}
$scope.nextView=function(option){

  $scope.option=option;
  console.log("changesdvalues status",$scope.option);
}

});
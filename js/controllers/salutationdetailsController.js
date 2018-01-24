angular.module('MetronicApp').controller('salutationdetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formSalutation=false;
 
$scope.newSalutation=function(){
	$rootScope.salutationid="";
 $rootScope.salutationvalue="";
 $scope.salutationsavebutton=true;

    $state.go('cvSalutation',{core:$scope.salutationsavebutton}) 

};


$scope.getsalutation =function(){ 
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/salutation ',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    //console.log(data);
    $scope.salutationData = data.Salutation;
    console.log($scope.salutationData);
    

    
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.getsalutation();

$scope.viewSalutation=function(salutationvalue,salutationid,status){

	 $rootScope.salutationid=salutationid;
 $rootScope.salutationvalue=salutationvalue;
  $rootScope.option=status;
 // $scope.save=true;
  $state.go('cvSalutation');
   // $state.go('cvSalutation') 
}




});
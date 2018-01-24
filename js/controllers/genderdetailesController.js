angular.module('MetronicApp').controller('genderdetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formGender=false;
 
$scope.newGender=function(){
	$rootScope.GenderID="";
	$rootScope.gendername="";
  $rootScope.Status="";
	/*$scope.createRoles=true;
    $state.go('cvRole',{mode:$scope.createRoles});*/
    $scope.genderSave=true;
    $state.go('cvGender',{gendertext:$scope.genderSave})

};


$scope.getGender=function(){
    
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/displaygender',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.gender=data.gender;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getGender();

$scope.viewGender=function(GenderID,gendername,Status){
$rootScope.GenderID=GenderID;
	  $rootScope.gendername=gendername;
    $rootScope.Status=Status;
  $state.go('cvGender')  
}




});
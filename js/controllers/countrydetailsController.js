angular.module('MetronicApp').controller('countrydetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formCountry=false;
 
$scope.newCountry=function(){
  $rootScope.countryCode="";
  $rootScope.countryDescription="";
  $rootScope.phoneCode="";
  $rootScope.countrystatus="";
  $scope.countrySave=true;
    $state.go('cvCountry',{update:$scope.countrySave})

};


$scope.getCountry=function(){
    
   $http({
    method : 'POST',
    url    : 'http://park.sastratechnologies.biz/service/nationality',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
   $scope.Nationality=data.Nationality;
    
   })
   .error(function(data){
        console.log(data);
    });

}
$scope.getCountry();

$scope.viewCountry=function(countrycode,countryDescription,PhoneCode,countrystatus){
	$rootScope.countryCode=countrycode;
	  $rootScope.countryDescription=countryDescription;
	  $rootScope.phoneCode=PhoneCode;
  $rootScope.countrystatus=countrystatus;
   $state.go('cvCountry');
}




});
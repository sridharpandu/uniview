angular.module('MetronicApp').controller('maritalstatusController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formMaritalStatus=false;
 
$scope.newMaritalStatus=function(){
   $rootScope.maritalidid="";
 $rootScope.maritalname="";
 $scope.maritalsavebutton=true;
    $state.go('cvMaritalStatus',{core:$scope.maritalsavebutton}) 

};

$scope.getmarital =function(){
   $http({
    method : 'POST',
    url    : '  http://park.sastratechnologies.biz/service/maritalstatus',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    console.log(data);
    $scope.releaseData = data.maritalstatus;
    console.log($scope.releaseData); 

    // $scope.religionid=$scope.releaseData.ID;
    // $scope.religionname=$scope.releaseData.value;
    // $state.go('dashboard')
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.getmarital();




$scope.viewMaritalStatus=function(maritalid,maritalvalue,status){
  console.log("id",maritalid);
   $rootScope.maritalidid=maritalid;
 $rootScope.maritalname=maritalvalue;
 $rootScope.option=status;
   $state.go('cvMaritalStatus') 
}




});
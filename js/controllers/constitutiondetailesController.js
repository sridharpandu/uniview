angular.module('MetronicApp').controller('constitutiondetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formConstitution=false;
 
$scope.newConstitution=function(){ 
	$rootScope.constitutionid="";
 $rootScope.constitutionname="";
  $rootScope.type="";
// $scope.religionsavebutton=true;
$scope.constitutionsavebutton=true;
    $state.go('cvConstitution',{core:$scope.constitutionsavebutton})

};


$scope.getconstitution =function(){   
   $http({
    method : 'POST',
    url    : '  http://park.sastratechnologies.biz/service/constitution',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    //console.log(data);
    $scope.constitution = data.constitution;
    console.log($scope.releaseData);
    // for(var i=0; i< $scope.releaseData.length;i++) {
    // $rootScope.religionid=$scope.releaseData[i].ID;
    // $rootScope.religionname=$scope.releaseData[i].value;
// }

    
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.getconstitution();

$scope.viewConstitution=function(constitutionid,constitutionname,status,type){
	$rootScope.constitutionid=constitutionid;
 $rootScope.constitutionname=constitutionname;
 $rootScope.option=status;
 $rootScope.type=type;
  $state.go('cvConstitution') 
}




});
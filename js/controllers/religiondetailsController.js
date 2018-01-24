angular.module('MetronicApp').controller('religiondetailsController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formReligion=false;
 
$scope.newReligion=function(){
  $rootScope.religionid="";
 $rootScope.religionname="";
// $scope.religionsavebutton=true;
$scope.religionsavebutton=true;
    $state.go('cvReligion',{core:$scope.religionsavebutton})

};

$scope.getreligion =function(){   
   $http({
    method : 'POST',
    url    : '  http://park.sastratechnologies.biz/service/religion',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    //console.log(data);
    $scope.releaseData = data.Religion;
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

$scope.getreligion();


$scope.viewReligion=function(religionvalue,religionid,status){
  // console.log("idvalue",religionid);
// console.log("value",religionvalue);
 $rootScope.religionid=religionid;
 $rootScope.religionname=religionvalue;
 $rootScope.option=status;
 // $scope.save=true;
  $state.go('cvReligion');


}




});
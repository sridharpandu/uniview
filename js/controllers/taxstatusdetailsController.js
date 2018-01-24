angular.module('MetronicApp').controller('taxstatusdetailesController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
     $("[name='makeSwitch']").bootstrapSwitch();
     $scope.formTaxStatus=false;
 
$scope.newTaxStatus=function(){
	$rootScope.taxid="";
 $rootScope.taxname="";
 $scope.taxsavebutton=true;

    $state.go('cvTaxStatus',{core:$scope.taxsavebutton})

}; 


$scope.gettax =function(){   
   $http({
    method : 'POST',
    url    : ' http://park.sastratechnologies.biz/service/taxstatus',   
    headers :
            {
                'Content-Type':'application/x-www-form-urlencoded',
               
            }
    }) 
   .success(function(data) {
    //console.log(data);
    $scope.taxstatus = data.Taxstatus;
    // console.log($scope.releaseData);
    // for(var i=0; i< $scope.releaseData.length;i++) {
    // $rootScope.religionid=$scope.releaseData[i].ID;
    // $rootScope.religionname=$scope.releaseData[i].value;
// }

    
   })
   .error(function(data){
        console.log(data);
    });

}

$scope.gettax();


$scope.viewTaxStatus=function(taxid,taxname,status){
	 $rootScope.taxid=taxid;
 $rootScope.taxname=taxname;
 $rootScope.option=status;
   $state.go('cvTaxStatus')  
}




});
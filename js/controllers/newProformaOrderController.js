angular.module('MetronicApp').controller('newProformaOrderController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {
ComponentsDateTimePickers.init();
$state.params.text
console.log($state.params.text);
		if($state.params.text)
		{
		$scope.newdetails =true;
		$scope.viewdetails=false;
		}
		else
		{
		$scope.newdetails =false;
		$scope.viewdetails=true;
		}
$scope.proforma=[
	{
 		"itemDetails":"REDMI",
 		"quality":"3"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"5000" 
	},
	{"itemDetails":"TOYS",
 		"quality":"3"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"1000" 
	},
	{
    	"itemDetails":"LAPTOP",
 		"quality":"3"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"45000" 

	},
	{"itemDetails":"BOOK",
 		"quality":"1"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"5000" 
	},
	{
		"itemDetails":"LAPTOP BATTERY",
 		"quality":"2"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"8000" 
	},
	{
		"itemDetails":"BULETOOTH",
 		"quality":"1"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"5000" 
	},
	{
		"itemDetails":"CAMERA",
 		"quality":"3"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"5000" 
	}
];
$scope.proformainvoice=[
	{
 		"itemDetails":"REDMI",
 		"quality":"3"  ,
 		"rate":"3.5",
 		"tax":"0.34",
 		"amount":"5000" 
	}
	
];
$scope.newrow=function(){
	$scope.proformainvoice.push({

                            "tax":"",
                           " QUANTITY":"",
                           "items":"",
                              "rate" :"",
                              "amount":"",
                              "action":"",
                          });
}


$scope.deleteRow=function(index){
	$scope.proformainvoice.splice(index, 1);

}
$scope.cancel=function(){
	$state.go('proformaorder')
}
});
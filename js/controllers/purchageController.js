   angular.module('MetronicApp').controller('purchageController', function(config, $rootScope, $scope, $http, $timeout, $location,$state) {

    

    $scope.purchage = [

  {
    date:"1998/04/12",
    ponumber:"956895",
    vendor:"manipal",
    status:"draft",
    amount:"77887"
  },
  {
    date:"1945/03/04",
    ponumber:"896523",
    vendor:"euronet",
    status:"approved",
    amount:"15989"
  }, 
  {
    date:"1956/02/15",
    ponumber:"89567",
    vendor:"vct",
    status:"billed",
    amount:"669988"
  },
  {
    date:"2015/09/19",
    ponumber:"45896",
    vendor:"courier",
    status:"partly billed",
    amount:"787458"
  },
  {
    date:"2014/06/18",
    ponumber:"38456",
    vendor:"vct",
    status:"closed",
    amount:"95589"
  },
  {
    date:"2015/05/01",
    ponumber:"45896",
    vendor:"courier",
    status:"partly billed",
    amount:"787458"
  },
  {
    date:"1859/11/26",
    ponumber:"45789",
    vendor:"courier",
    status:"cancelled",
    amount:"897425"
  },
  {
    date:"2013/09/24",
    ponumber:"85968",
    vendor:"manipal",
    status:"draft",
    amount:"89756"
  },
  {
    date:"2017/02/18",
    ponumber:"56984",
    vendor:"vct",
    status:"billed",
    amount:"58964"
  },
  {
    date:"1999/06/22",
    ponumber:"457963",
    vendor:"manipal",
    status:"approved",
    amount:"8974"
  },
  {
    date:"2012/02/19",
    ponumber:"59595",
    vendor:"vct",
    status:"billed",
    amount:"9856"
  },
];

// $scope.carColors = ["ALL","Draft","Approved","Billed","PartlyBilled","Closed","Cancelled"];


$scope.newConstitution=function(){
  // $scope.disabled=true;
  $rootScope.disabled=false;
$scope.newpurchasedetails=true;
  $state.go('newPurchaseOrder',{purchase:$scope.newpurchasedetails})
  
}

$scope.viewpurchasedetailes=function(){

$rootScope.disabled=true;

$state.go('newPurchaseOrder')

}

$scope.customFilter = function (purchage) {
    if (purchage.status === dropdownfilter) {
      console.log("dropdown",dropdownfilter);
      return true;
    } else if (dropdownfilter === "") {
      return true;
    } else {
      return false;
    }
  };  

// column_number: 4,
// filter_match_mode : "exact"
// initialize filter object
// $scope.filter ="";

// reset the filter
var dropdownfilter="";
$scope.filters = function(filter) {
  // column_number: 4,
dropdownfilter=filter;
console.log("dropdown",dropdownfilter);
// filter_match_mode : "exact"
  // set filter object as blank
  if(filter==""){
  $scope.filter = ""; 
}
}
   });
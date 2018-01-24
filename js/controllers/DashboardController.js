angular.module('MetronicApp').controller('DashboardController', function(config, $rootScope, $scope, $http, $timeout, $location) {
    
 
// //Default LeadType set
// $rootScope.leadType = "I-SALR";

// //Leads by Constitions
// $scope.constLeads = function(){
    
//     $http({
//         method : 'put',
//         url    : 'http://' + config.AppiyoIP + '/appiyo/ProcessStore/d/workflows/' + config.apiProcessID_ConstLead + '/execute?projectId=' + config.newProjectID,
//         data   : 'processVariables='+JSON.stringify({
//                     "processId":config.apiProcessID_ConstLead,//"b90e461493a211e7a78b0e1da0678571",
//                     "ProcessVariables":{
//                             "leadType":$scope.leadType,
//                             "uid":$rootScope.userId,
//                             },
//                     "projectId":config.newProjectID}),
//         headers :
//             {
//                 'Content-Type':'application/x-www-form-urlencoded',
//                 'authentication-token': $scope.token, 
//             }
//         })
//         .success(function(data){
//             console.log(data);
//             $scope.consLeads = data.ProcessVariables.LEADBYCONSTITUTIONS;
//         })
//         .error(function(data){
//             console.log(data);
//         })
//         //Author: Mohanraj C
//         //Date: 09/08/2017
// }

// $scope.recentLeads = function(){
 
//     $http({
//         method : 'put',
//         url    : 'http://' + config.AppiyoIP + '/appiyo/ProcessStore/d/workflows/' + config.apiProcessID_RecentLead + '/execute?projectId=' + config.newProjectID,
//         data   : 'processVariables='+JSON.stringify({
//                     "processId":config.apiProcessID_RecentLead,//"2a8181c45aed11e79d0a0050569cb68c",
//                     "ProcessVariables":
//                                     {
//                                     "uid":$rootScope.userId,
//                                     },
//                     "projectId":config.newProjectID}),
//         headers :
//             {
//                 'Content-Type':'application/x-www-form-urlencoded',
//                 'authentication-token': $scope.token, 
//             }
//         })
//         .success(function(data){
//             console.log(data);
//             $scope.rcntLeads = data.ProcessVariables.LAST_LEADS;
//         })
//         .error(function(data){
//             console.log(data);
//         })
//         //Author: Mohanraj C
//         //Date: 09/08/2017
// }

// //Dashboard Statics
// $scope.dashSat = function()
// {
//     $http({
//         method : 'put',
//         url    : 'http://' + config.AppiyoIP + '/appiyo/ProcessStore/d/workflows/' + config.apiProcessID_DashStatus + '/execute?projectId='+ config.newProjectID,
//         data   : 'processVariables='+JSON.stringify({
//                     "processId":config.apiProcessID_DashStatus,//c2a213e694aa11e7a78b0e1da0678571
//                     "ProcessVariables":{
//                                         "uid":$rootScope.userId,    
//                                         },
//                     "projectId":config.newProjectID}),
//         headers :
//             {
//                 'Content-Type':'application/x-www-form-urlencoded',
//                 'authentication-token': $scope.token, 
//             }
//         })
//         .success(function(data){
//             console.log(data);
//             $scope.leadStat = data.ProcessVariables.LeadStatics;
//             //$scope.rcntLeads = data.ProcessVariables.RECENT_LEADS;
//         })
//         .error(function(data){
//             console.log(data);
//         })
//     //Author: Mohanraj C
//     //Date: 11-08-2017    
// }

// //Lead Status
// $scope.leadStatus = function()
// {
//     $http({
//         method : 'put',
//         url    : 'http://' + config.AppiyoIP + '/appiyo/ProcessStore/d/workflows/' + config.apiProcessID_StatusLead + '/execute?projectId=' + config.newProjectID,
//         data   : 'processVariables='+JSON.stringify({
//                     "processId":config.apiProcessID_StatusLead,//5d506e12884211e7a78b0e1da0678571
//                     "ProcessVariables":{},
//                     "projectId":config.newProjectID}),
//         headers :
//             {
//                 'Content-Type':'application/x-www-form-urlencoded',
//                 'authentication-token': $scope.token, 
//             }
//         })
//         .success(function(data){
//             console.log(data);
//             $scope.listLeadStatus = data.ProcessVariables.updatedStatus;
//             //$scope.rcntLeads = data.ProcessVariables.RECENT_LEADS;
//         })
//         .error(function(data){
//             console.log(data);
//         })
//     //Author: Mohanraj C
//     //Date: 12-08-2017
// }

// //Individual Salary
// $scope.inSal = function()
// {
  
//   $rootScope.leadType = "I-SALR";
//   $scope.constLeads();
//   //$scope.consLeads = $scope.insSalR;
// }
// //Corporate Trust
// $scope.coTru =function()
// {
//   $rootScope.leadType = "C-TRUS";
//   $scope.constLeads();
//   //$scope.consLeads = $scope.corTruS;
// }
// //Individual Self Emply
// $scope.inSep = function()
// {
//   $rootScope.leadType = "I-SEPR";
//   $scope.constLeads();
//  // $scope.consLeads = $scope.inSepR;
// }
// //Individual Self
// $scope.inSen = function()
// {
// $rootScope.leadType = "I-SENP";
// $scope.constLeads();
// //$scope.consLeads = $scope.inSenP;
// }
// //Corporate Private Ltd
// $scope.coPvt = function()
// {
// $rootScope.leadType = "C-PVTL";
// $scope.constLeads();
// //$scope.consLeads = $scope.corPvtL;
// }
// //Corporate Public 
// $scope.coPub = function()
// {
//  $rootScope.leadType = "C-PUBL";
//  $scope.constLeads(); 
//  //$scope.consLeads = $scope.corPubL;
// }
// //Corporate PART
// $scope.coPar = function()
// {
// $rootScope.leadType = "C-PART";
// $scope.constLeads();
// //$scope.consLeads = $scope.corParT;
// }
// //Corporate Propratership
// $scope.coPro = function()
// {
// $rootScope.leadType = "C-PROP";
// $scope.constLeads();
// //$scope.consLeads = $scope.corProP;
// }
// $scope.coGro = function()
// {
// $rootScope.leadType = "C-GROU";
// $scope.constLeads();
// //$scope.consLeads = $scope.corProP;
// }
// $scope.coHuf = function()
// {
// $rootScope.leadType = "C-HUF";
// $scope.constLeads();
// //$scope.consLeads = $scope.corProP;
// }

// $scope.constLeads();
// $scope.recentLeads();
// $scope.dashSat();
// $scope.leadStatus();

});
/***
Metronic AngularJS App Main Script
***/

/* Metronic App */
var MetronicApp = angular.module("MetronicApp", [
    "ui.router",
    "ui.bootstrap",
    "oc.lazyLoad",
    "ngSanitize"
]);

/* Configure ocLazyLoader(refer: https://github.com/ocombe/ocLazyLoad) */
MetronicApp.config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
    $ocLazyLoadProvider.config({
        // global configs go here
    });
}]);



//AngularJS v1.3.x workaround for old style controller declarition in HTML
MetronicApp.config(['$controllerProvider', function($controllerProvider) {
    // this option might be handy for migrating old apps, but please don't use it
    // in new ones!
    $controllerProvider.allowGlobals();
}]);

/********************************************
 END: BREAKING CHANGE in AngularJS v1.3.x:
*********************************************/

/* Setup global settings */
MetronicApp.factory('settings', ['$rootScope', function($rootScope) {
    // supported languages
    var settings = {
        layout: {
            pageSidebarClosed: false, // sidebar menu state
            pageContentWhite: true, // set page content layout
            pageBodySolid: false, // solid body color state
            pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
        },
        assetsPath: '../assets',
        globalPath: '../assets/global',
        layoutPath: '../assets/layouts/layout',
    };

    $rootScope.settings = settings;

    return settings;
}]);

/* Setup App Main Controller */
MetronicApp.controller('AppController', ['plugins','lmsProcess','config','$scope', '$rootScope', '$http', '$location', function(plugins,lmsProcess,config,$scope, $rootScope, $http, $location) {
    $scope.$on('$viewContentLoaded', function() {

        //Author: Mohanraj C 
        //Date: 09/08/2017

    });

    //MetronicApp.expandControllerB();
    // redirect on session clear - reload
    if ($rootScope.userId == undefined) {
       $location.path('/userLogin');
    }
    // end of redirect on session clear - reload
    //$rootScope.configCall();

    //Right Click Menu Disability
    //$('body').on('contextmenu', '#RightClickDisable', function (e) { return false; });

     
    // //Config Scopes
    // $scope.lgId = "rajesh.k@sastratechnologies.in";
    // $scope.lgPwd = "rajesh.k@123";
    // $scope.AppiyoIP = "139.59.35.249";
    // //$scope.projectID = "98962aa6881611e7a78b0e1da0678571";
    // $scope.projectID = "ee9503dc9c4d11e7a78b0e1da0678571";
    // $scope.newProjectID = "ee9503dc9c4d11e7a78b0e1da0678571";

    // //Permission Flag
    // $rootScope.SALDFlag = false;
    // $rootScope.CPCDFlag = false;
    // $rootScope.OPADFlag = false;
    // $rootScope.OPLDFlag = false;
    // $rootScope.OPFDFlag = false;
    // $rootScope.CRDDFlag = false;
    // $rootScope.FIDDFlag = false;
    // $rootScope.PRMGFlag = false;
    // $rootScope.SETTFlag = false;

    // //Borrower Block Wise Permission
    // $rootScope.borrDetUpdate = true;
    // $rootScope.borrIdentityDetUpdate = true;
    // $rootScope.borrEmpDetUpdate = true;
    // $rootScope.borrResDetUpdate = true;
    // $rootScope.borrEduDetUpdate = true;

    // //dedupe App ID or Lead ID Decide
    // $rootScope.appIdSet = false;
    // $rootScope.leadIdSet = false;

    // //Bpm Login for seasion
    // $scope.loginScope = function() {
    //     $http({
    //             method: 'POST',
    //             url: 'http://' + config.AppiyoIP + '/appiyo/account/login',
    //             data: 'email=' + config.lgId + '&' +
    //                 'password=' + btoa(config.lgPwd) + '&' +
    //                 'passwordEncoded=true',
    //             headers: {
    //                 'Content-Type': 'application/x-www-form-urlencoded',
    //                 'Accept': 'application/json',
    //             }
    //         })
    //         .success(function(data) {
    //             var token = data.token;
    //             $scope.token = token;
    //             console.log(token);
    //             //console.log('Config App '+config.appName);
    //         }).error(function(data) {
    //             console.log(data);
    //         });
    //     //Author: Mohanraj C
    //     //Date: 09/08/2017
    // }

    // //Logout Call
    // $scope.userLogout = function() {
    //     //alert("got");
    //     $http({
    //             method: 'GET',
    //             url: 'http://' + $scope.AppiyoIP + '/appiyo/account/logout',
    //             data: '', //processVariables='+JSON.stringify({
    //             headers: {
    //                 'Content-Type': 'application/x-www-form-urlencoded',
    //                 'Accept': 'application/json',
    //             }
    //         })
    //         .success(function(data) {
    //             console.log(data);
    //             $location.path("/userLogin");
    //             $rootScope.SALDFlag = false;
    //             $rootScope.CPCDFlag = false;
    //             $rootScope.OPADFlag = false;
    //             $rootScope.OPLDFlag = false;
    //             $rootScope.OPFDFlag = false;
    //             $rootScope.CRDDFlag = false;
    //             $rootScope.FIDDFlag = false;
    //             $rootScope.PRMGFlag = false;
    //             $rootScope.SETTFlag = false;
    //             $rootScope.viewData = "";
    //         })
    //         .error(function(data) {
    //             console.log(data);
    //         })
    //         //Author: Mohanraj C
    //         //Date: 12-08-2017
    // }

    // $scope.leadTypeGet = function(typeId) {

    //     switch (typeId) {
    //         case "1":
    //             leadType = "I-SALR";
    //             break;
    //         case "2":
    //             leadType = "I-SEPR";
    //             break;
    //         case "3":
    //             leadType = "I-SENP";
    //             break;
    //         case "4":
    //             leadType = "C-PROP";
    //             break;
    //         case "5":
    //             leadType = "C-PART";
    //             break;
    //         case "6":
    //             leadType = "C-PVTL";
    //             break;
    //         case "7":
    //             leadType = "C-PUBL";
    //             break;
    //         case "8":
    //             leadType = "C-TRUS";
    //             break;
    //         case "9":
    //             leadType = "C-GROU";
    //             break;
    //         case "10":
    //             leadType = "C-HUF";
    //             break;
    //     }
    //     return leadType;
    // }

    // //Application View By application ID
    // $rootScope.applicationViewID = function(num) {

    //     bootbox.prompt({
    //             size: "small",
    //             title: "Enter the Application ID",
    //             callback: function(AppID) { /* result = String containing user input if OK clicked or null if Cancel clicked */

    //                 $http({
    //                         method: 'put',
    //                         url: 'http://' + $scope.AppiyoIP + '/appiyo/ProcessStore/d/workflows/4b754f46b7f411e7a78b0e1da0678571/execute?projectId=' + $scope.projectID,
    //                         data: 'processVariables=' + JSON.stringify({
    //                             "processId": "4b754f46b7f411e7a78b0e1da0678571",
    //                             "ProcessVariables": {
    //                                 "applicationId": AppID,
    //                             },
    //                             "projectId": $scope.projectID
    //                         }),
    //                         headers: {
    //                             'Content-Type': 'application/x-www-form-urlencoded',
    //                             'authentication-token': $scope.token,
    //                         }
    //                     })
    //                     .success(function(data) {
    //                         console.log(data);
    //                         var pv = data.ProcessVariables;
    //                         $rootScope.viewData = pv.ab_lead;
    //                         $rootScope.leadTypeFromDB = $scope.leadTypeGet($rootScope.viewData.leadType);
    //                         console.log($rootScope.leadTypeFromDB);
    //                         $rootScope.leadIdFrmDB = AppID;
    //                         console.log($rootScope.leadIdFrmDB);
    //                         $rootScope.leadNameFromDB = $rootScope.viewData.leadName;
    //                         console.log($rootScope.viewData);
    //                         if(pv.ab_individual_details){
    //                         $rootScope.leadIndividual = pv.ab_individual_details;
    //                         console.log($rootScope.leadIndividual);
    //                         }
    //                         if(pv.ab_lead_identify_details){
    //                         $rootScope.leadIdentity = pv.ab_lead_identify_details;
    //                         console.log($rootScope.leadIdentity);
    //                         }
    //                         if(pv.ab_lead_employment_details){
    //                         $rootScope.leadEmployment = pv.ab_lead_employment_details;
    //                         console.log($rootScope.leadEmployment);
    //                         }
    //                         if(pv.ab_lead_currentaddress){
    //                         $rootScope.currentAddress = pv.ab_lead_currentaddress;
    //                         console.log('Current Address',$rootScope.currentAddress);    
    //                         }
    //                         if(pv.ab_lead_permanentaddress){
    //                         $rootScope.permanentAddress = pv.ab_lead_permanentaddress;
    //                         console.log($rootScope.permanentAddress);
    //                         }
    //                         if(pv.ab_lead_educationdetails){
    //                         $rootScope.educationalDetails = pv.ab_lead_educationdetails;
    //                         console.log($rootScope.educationalDetails);
    //                         }
    //                         if(pv.ab_lead_existingfinancedetails){
    //                         $rootScope.existFinanceDetails = pv.ab_lead_existingfinancedetails;
    //                         console.log($rootScope.existFinanceDetails);
    //                         }
    //                         if(pv.ab_lead_bankdetails){
    //                         $rootScope.existBankDetails = pv.ab_lead_bankdetails;
    //                         console.log($rootScope.existBankDetails);
    //                         }
    //                         if(pv.ab_lead_loan_deatils){
    //                         $rootScope.existBorrowDetails = pv.ab_lead_loan_deatils;
    //                         console.log($rootScope.existBorrowDetails);    
    //                         }
    //                         if(pv.ab_lead_loan_deatils){
    //                         $rootScope.existBorrowDetails = pv.ab_lead_loan_deatils;
    //                         console.log($rootScope.existBorrowDetails);
    //                         }
    //                         if(pv.ab_lead_deduresult){
    //                         $rootScope.appdedupeResult = pv.ab_lead_deduresult;
    //                         console.log($rootScope.appdedupeResult);
    //                         }
    //                         if(pv.ab_lead_firesult){
    //                         $rootScope.fiResults = pv.ab_lead_firesult;
    //                         console.log($rootScope.fiResults);
    //                         }    
    //                         if(pv.ab_lead_studentdetails){
    //                         $rootScope.studendtDetails1 = pv.ab_lead_studentdetails[0];
    //                         console.log($rootScope.studendtDetails1);
    //                         }
    //                         if(pv.ab_lead_studentdetails){
    //                         $rootScope.studendtDetails2 = pv.ab_lead_studentdetails[1];
    //                         console.log($rootScope.studendtDetails2);
    //                         }
                            
    //                     })
    //                     .error(function(data) {
    //                         console.log(data);
    //                     })
                    
    //                 if (num == 1) {
    //                     // if($rootScope.viewData.leadType > 0){
    //                         //alert($rootScope.viewData.leadType);
    //                         // if($rootScope.viewData.leadType < 8){
    //                            // alert($rootScope.viewData.leadType);
    //                             $location.url('/applicationTypeBaseEdit');
    //                     //     }
    //                     // }
    //                     // }else{
    //                     //     //$location.url('/assetApplication');
    //                     // }
                        
    //                 }
    //                 if (num == 2) {
    //                     $location.url('/addCoBorrower');
    //                     $rootScope.coBorrAppId = AppID;
    //                 }
    //                 if (num == 3) {
    //                     $location.url('/firesult.html');
    //                 }
    //                 if (num == 4) {
    //                     $rootScope.appIdSet = true;
    //                     $rootScope.leadIdSet = false;
    //                     $location.url('/dedup');
    //                 }
    //                 if (num == 5) {
    //                     $location.url('/existingfinancialdetails');
    //                 }
    //                 if (num == 6) {
    //                     $location.url('/existing-borrowing');
    //                 }
    //                 if (num == 7) {
    //                     $location.url('/studentdetails');
    //                 }
    //                 if (num == 9) {
    //                     $location.url('/sanction');   
    //                 }
    //                 // if(num == 4){
    //                 //     alert("got");
    //                 //     $location.url('/corporateProprietary');
    //                 // }
    //                 if (num == 8) {
    //                     $location.url('/mortgageDetails');   
    //                 }

    //             }
    //         })
    //         //Author: Mohanraj.c
    //         //Date: 20/10/2017
    // }

    // $rootScope.coBorrowerView = function() {
    //     // alert("gg");
    //     $location.url('/co-borrower');
    //     //setTimeout(function() { $('#AcLdModal1').modal('show');});
    // }

    // //partitial LeadView
    // $rootScope.partLeadView = function(num) {

    //     //bootbox for get lead ID

    //     bootbox.prompt({
    //         size: "small",
    //         title: "Enter the Lead ID",
    //         callback: function(LeadID) { /* result = String containing user input if OK clicked or null if Cancel clicked */

    //             //       
    //             $http({
    //                     method: 'put',
    //                     url: 'http://' + $scope.AppiyoIP + '/appiyo/ProcessStore/d/workflows/5bed4acea1ea11e7a78b0e1da0678571/execute?projectId=' + $scope.projectID,
    //                     data: 'processVariables=' + JSON.stringify({
    //                         "processId": "5bed4acea1ea11e7a78b0e1da0678571",
    //                         "ProcessVariables": {
    //                             "leadId": parseInt(LeadID),
    //                             "type": "",
    //                         },
    //                         "projectId": $scope.projectID
    //                     }),
    //                     headers: {
    //                         'Content-Type': 'application/x-www-form-urlencoded',
    //                         'authentication-token': $scope.token,
    //                     }
    //                 })
    //                 .success(function(data) {
    //                     console.log(data);
    //                     // $rootScope.leadData = data.ProcessVariables.ab_lead;
    //                     // $rootScope.leadTypeFromDB = $scope.leadTypeGet($rootScope.leadData.leadType);

    //                     $rootScope.viewData = data.ProcessVariables.ab_lead;
    //                     $rootScope.leadTypeFromDB = $scope.leadTypeGet($rootScope.viewData.leadType);
    //                     $rootScope.leadIdFrmDB = LeadID;
    //                     $rootScope.leadNameFromDB = $rootScope.viewData.leadName;

    //                     console.log($rootScope.viewData);
    //                     $rootScope.leadIndividual = data.ProcessVariables.ab_lead_individual_details;
    //                     console.log($rootScope.leadIndividual);
    //                     $rootScope.leadIdentity = data.ProcessVariables.ab_lead_identify_details;
    //                     console.log($rootScope.leadIdentity);
    //                     $rootScope.leadEmployment = data.ProcessVariables.ab_lead_employment_details;
    //                     console.log($rootScope.leadEmployment);
    //                     $rootScope.currentAddress = data.ProcessVariables.ab_constituent_currentaddress;
    //                     console.log($rootScope.currentAddress);
    //                     $rootScope.permanentAddress = data.ProcessVariables.ab_constituent_permanentaddress;
    //                     console.log($rootScope.permanentAddress);
    //                     $rootScope.educationalDetails = data.ProcessVariables.ab_lead_education_details;
    //                     console.log($rootScope.educationalDetails);
    //                     $rootScope.existFinanceDetails = data.ProcessVariables.ab_lead_existingfinancedetails;
    //                     console.log($rootScope.existFinanceDetails);
    //                     $rootScope.existBankDetails = data.ProcessVariables.ab_lead_bank_details;
    //                     console.log($rootScope.existBankDetails);
    //                     $rootScope.existBorrowDetails = data.ProcessVariables.ab_lead_loan_details;
    //                     console.log($rootScope.existBorrowDetails);
    //                     $rootScope.dedupeResult = data.ProcessVariables.ab_lead_deduperesult;
    //                     console.log($rootScope.dedupeResult);
    //                     if (num == 1) {
    //                         $rootScope.borrDetUpdate = true;
    //                         $rootScope.borrIdentityDetUpdate = false;
    //                         $rootScope.borrEmpDetUpdate = false;
    //                         $rootScope.borrResDetUpdate = false;
    //                         $rootScope.borrEduDetUpdate = false;
    //                         $location.url('/borrower');
    //                     }
    //                     if (num == 2) {
    //                         $rootScope.borrDetUpdate = false;
    //                         $rootScope.borrIdentityDetUpdate = false;
    //                         $rootScope.borrEmpDetUpdate = true;
    //                         $rootScope.borrResDetUpdate = false;
    //                         $rootScope.borrEduDetUpdate = false;
    //                         $location.url('/borrower');
    //                     }
    //                     if (num == 3) {
    //                         $rootScope.borrDetUpdate = false;
    //                         $rootScope.borrIdentityDetUpdate = false;
    //                         $rootScope.borrEmpDetUpdate = false;
    //                         $rootScope.borrResDetUpdate = true;
    //                         $rootScope.borrEduDetUpdate = false;
    //                         $location.url('/borrower');
    //                     }
    //                     if (num == 4) {
    //                         $rootScope.borrDetUpdate = false;
    //                         $rootScope.borrIdentityDetUpdate = false;
    //                         $rootScope.borrEmpDetUpdate = false;
    //                         $rootScope.borrResDetUpdate = false;
    //                         $rootScope.borrEduDetUpdate = true;
    //                         $location.url('/borrower');
    //                     }
    //                     if (num == 7) {
    //                         $rootScope.appIdSet = false;
    //                         $rootScope.leadIdSet = true;
    //                         $location.url('/dedup');
    //                     }

    //                 })
    //                 .error(function(data) {
    //                     console.log(data);
    //                 })
    //                 //Autor: Mohanraj C
    //                 //Date: 13/10/2017
    //         }
    //     })
    // }

    // //LOV Load
    // $rootScope.reassignUsersLoad = function() {
    //     $http({
    //             method: 'put',
    //             url: 'http://' + $scope.AppiyoIP + '/appiyo/ProcessStore/d/workflows/0a49ea1e93ae11e7a78b0e1da0678571/execute?projectId=' + $scope.projectID,
    //             data: 'processVariables=' + JSON.stringify({
    //                 "processId": "0a49ea1e93ae11e7a78b0e1da0678571",
    //                 "ProcessVariables": {
    //                     "getleadId": parseInt($rootScope.visitLeadID),
    //                     "getuserId": parseInt($rootScope.userId),
    //                 },
    //                 "projectId": $scope.projectID
    //             }),
    //             headers: {
    //                 'Content-Type': 'application/x-www-form-urlencoded',
    //                 'authentication-token': $scope.token,
    //             }
    //         })
    //         .success(function(data) {
    //             console.log(data);
    //             $rootScope.reassigndaLeadData = data.ProcessVariables.usernamelist;
    //             $rootScope.reassignedLeadView = data.ProcessVariables.SELECTLEADREASSIGNLIST;
    //         })
    //         .error(function(data) {
    //             console.log(data);
    //         })
    //         //Autor: Mohanraj C
    //         //Date: 04-09-2017
    // }

    // //Lead View Call
    // $rootScope.leadView = function(leadId, leadName, leadType) {
    //     //alert("HHH");
    //     var typeId = "";

    //     if (leadType == undefined) {
    //         leadType = $rootScope.leadType;
    //     }
    //     $rootScope.leadTypeFromDB = leadType;
    //     switch (leadType) {
    //         case "I-SALR":
    //             typeId = 1;
    //             break;
    //         case "I-SEPR":
    //             typeId = 2;
    //             break;
    //         case "I-SENP":
    //             typeId = 3;
    //             break;
    //         case "C-PROP":
    //             typeId = 4;
    //             break;
    //         case "C-PART":
    //             typeId = 5;
    //             break;
    //         case "C-PVTL":
    //             typeId = 6;
    //             break;
    //         case "C-PUBL":
    //             typeId = 7;
    //             break;
    //         case "C-TRUS":
    //             typeId = 8;
    //             break;
    //         case "C-GROU":
    //             typeId = 9;
    //             break;
    //         case "C-HUF":
    //             typeId = 10;
    //             break;
    //     }
    //     //alert("got");
    //     $rootScope.leadIdFrmDB = leadId;
    //     $rootScope.leadNameFromDB = leadName;

    //     if (typeId <= 3) {
    //         $rootScope.leadDetailShow = true;
    //         $rootScope.identityDetailShow = true;
    //         $rootScope.employmentDetailShow = true;
    //         $rootScope.addressDetailShow = true;
    //         $rootScope.eduDetailShow = true;

    //         $rootScope.viewData = "";
    //         $rootScope.leadIndividual = "";
    //         $rootScope.leadIdentity = "";
    //         $rootScope.leadEmployment = "";
    //         $rootScope.currentAddress = "";
    //         $rootScope.permanentAddress = "";
    //         $rootScope.educationalDetails = "";
    //         $rootScope.currentcencustype = "";
    //         $rootScope.currentcencustype = "";
    //         $rootScope.dependent = "";
    //         $rootScope.permanentcencustype = "";
    //         $rootScope.asset = "";
    //         $rootScope.kycBankDetailsList = "";
    //         $rootScope.loanDetailsList = "";

    //         // $location.url('/leadDetailedEntry');
    //         $http({
    //                 method: 'put',
    //                 url: 'http://' + $scope.AppiyoIP + '/appiyo/ProcessStore/d/workflows/5bed4acea1ea11e7a78b0e1da0678571/execute?projectId=' + $scope.newProjectID,
    //                 data: 'processVariables=' + JSON.stringify({
    //                     "processId": "5bed4acea1ea11e7a78b0e1da0678571",
    //                     "ProcessVariables": {
    //                         "leadId": 1844,
    //                         "leadId": parseInt(leadId),
    //                         "type": typeId.toString(),
    //                     },
    //                     "projectId": $scope.newProjectID
    //                 }),
    //                 headers: {
    //                     'Content-Type': 'application/x-www-form-urlencoded',
    //                     'authentication-token': $scope.token,
    //                 }
    //             })
    //             .success(function(data) {
    //                 console.log(data);
    //                 var pv = data.ProcessVariables;
    //                 if(pv.ab_lead){
    //                     $rootScope.viewData = pv.ab_lead;
    //                     console.log($rootScope.viewData);
    //                 }
    //                 if(pv.ab_lead_individual_details){
    //                     $rootScope.leadIndividual = pv.ab_lead_individual_details;
    //                     console.log($rootScope.leadIndividual);
    //                 }
    //                 if(pv.ab_lead_identify_details){
    //                     $rootScope.leadIdentity = pv.ab_lead_identify_details;
    //                     console.log($rootScope.leadIdentity);
    //                 }
    //                 if(pv.ab_lead_employment_details){
    //                     $rootScope.leadEmployment = pv.ab_lead_employment_details;
    //                     console.log($rootScope.leadEmployment);
    //                 }
    //                 if(pv.ab_constituent_currentaddress){
    //                     $rootScope.currentAddress = pv.ab_constituent_currentaddress;
    //                     console.log($rootScope.currentAddress);
    //                 }
    //                 if(pv.ab_constituent_permanentaddress){
    //                     $rootScope.permanentAddress = pv.ab_constituent_permanentaddress;
    //                     console.log($rootScope.permanentAddress);
    //                 }
    //                 if(pv.ab_lead_education_details){
    //                     $rootScope.educationalDetails = pv.ab_lead_education_details;
    //                     console.log($rootScope.educationalDetails);
    //                 }
    //                 // if(pv.ab_lead_currentcensus.currentcencustype){
    //                 //     $rootScope.currentcencustype = pv.ab_lead_currentcensus.currentcencustype;
    //                 //     console.log($rootScope.currentcencustype);
    //                 // }
    //                 // if(pv.ab_lead_permanentcensus.permanentcensus){
    //                 //     $rootScope.dependent = pv.ab_lead_dependent[0];
    //                 //     console.log($rootScope.dependent);
    //                 // }
    //                 if(pv.ab_lead_assest_details[0]){
    //                     $rootScope.asset = pv.ab_lead_assest_details[0];
    //                     console.log($rootScope.asset);
    //                 }
    //                 if(pv.ab_lead_bankandkycdetails[0]){
    //                     $rootScope.kycBankDetailsList = pv.ab_lead_bankandkycdetails;
    //                     console.log($rootScope.kycBankDetailsList);
    //                 }
    //                 if(pv.ab_lead_existingLoanDetails){
    //                     $rootScope.loanDetailsList = pv.ab_lead_existingLoanDetails;
    //                     console.log($rootScope.loanDetailsList);
    //                 }
                    
    //             })
    //             .error(function(data) {
    //                 console.log(data);
    //             })

    //         $location.path('/leadDetailedEntry');
    //         //Mohanraj C
    //         //28-08-2017
    //     }
    //     if (typeId > 4) {

    //         $http({
    //                 method: 'put',
    //                 url: 'http://' + $scope.AppiyoIP + '/appiyo/ProcessStore/d/workflows/8cfc291aa9f011e7a78b0e1da0678571/execute?projectId=' + $scope.newProjectID,
    //                 data: 'processVariables=' + JSON.stringify({
    //                     "processId": "8cfc291aa9f011e7a78b0e1da0678571",
    //                     "ProcessVariables": {
    //                         "id": parseInt($rootScope.leadIdFrmDB),
    //                     },
    //                     "projectId": $scope.newProjectID
    //                 }),
    //                 headers: {
    //                     'Content-Type': 'application/x-www-form-urlencoded',
    //                     'authentication-token': $scope.token,
    //                 }
    //             })
    //             .success(function(data) {
    //                 console.log(data);
    //                 $rootScope.appDetail = data.ProcessVariables.APPLICATEDETAIS[0];
    //                 console.log($rootScope.appDetail);
    //                 $rootScope.asset = data.ProcessVariables.CORPORATEASSESTDETAILS[0];
    //                 $rootScope.address = data.ProcessVariables.CORPORATEADDRESS[0];
    //                 $rootScope.academic = data.ProcessVariables.ACCADEMICDETAILS[0];

    //                 //console.log($rootScope.academic);
    //             })
    //             .error(function(data) {
    //                 console.log(data);
    //             })
    //         $location.path('/corporateDetailedEntry');
    //     }
    //     if (typeId == 4) {
    //         $location.url('/corporateProprietor');
    //     }
    //     if (typeId == 5) {
    //         $location.url('/corporatePartnership');
    //     }

    //     if (typeId == 2) {
    //         $location.url('/selfEmployedProfessional');
    //     }
    //     if (typeId == 3) {
    //         $location.url('/selfEmployedNonProfessional');
    //     }
    //     if (typeId == 7) {
    //         $location.url('/corporatePublicLimited');
    //     }
    //     if (typeId == 6) {
    //         $location.url('/corporatePrivateLimited');
    //     }




    // }

    // //Menu bar lead detail entry content show
    // $rootScope.leadViewCall = function(num) {
    //     //alert(num);
    //     if (num == 1) {
    //         $rootScope.leadDetailShow = false;
    //         $rootScope.identityDetailShow = false;
    //         $rootScope.employmentDetailShow = true;
    //         $rootScope.addressDetailShow = false;
    //         $rootScope.eduDetailShow = false;
    //         $location.path('/leadDetailedEntry');
    //     }
    //     if (num == 2) {
    //         $rootScope.leadDetailShow = false;
    //         $rootScope.identityDetailShow = false;
    //         $rootScope.employmentDetailShow = false;
    //         $rootScope.addressDetailShow = true;
    //         $rootScope.eduDetailShow = false;
    //         $location.path('/leadDetailedEntry');
    //     }
    //     if (num == 3) {
    //         $rootScope.leadDetailShow = false;
    //         $rootScope.identityDetailShow = false;
    //         $rootScope.employmentDetailShow = false;
    //         $rootScope.addressDetailShow = false;
    //         $rootScope.eduDetailShow = true;
    //         $location.path('/leadDetailedEntry');
    //     }
    // }

    // $rootScope.msg = function() {
    //     //alert("ggg");
    // }

    // $rootScope.disburseGlobView = function(){

    //     $http({
    //         method: 'put',
    //         url: 'http://' + lmsProcess.AppiyoIP + '/appiyo/ProcessStore/d/workflows/'+ lmsProcess.apiLMS_IncomeDisburseView +'/execute?projectId=' + lmsProcess.projectID,
    //         data: "processVariables=" + JSON.stringify({
    //             "processId": lmsProcess.apiLMS_IncomeDisburseView,
    //             "ProcessVariables": {
    //                 "loanNumber": $rootScope.disburseLoanNum,
    //             },
    //             "projectId": lmsProcess.projectID,
    //         }),
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded',
    //             'authentication-token': $scope.token,
    //         }
    //     })
    //     .success(function(data) {
    //         console.log(data); 
    //         $rootScope.disburseViewData = data.ProcessVariables.disbursalview;
    //         $rootScope.disburseLoanNum = data.ProcessVariables.loanNumber;
    //         var len = $rootScope.disburseViewData.length;
    //         for(var i=0; i<len; i++){
    //             if($rootScope.disburseViewData[i].particulars == "1")
    //             {
    //                 $rootScope.disburseViewData[i].particulars = "SANCTION AMOUNT";
    //             }
    //             if($rootScope.disburseViewData[i].particulars == "2")
    //             {
    //                 $rootScope.disburseViewData[i].particulars = "DISBURSAL AMOUNT";
    //             }
    //         }
    //         console.log($rootScope.disburseViewData);
    //         console.log($rootScope.disburseLoanNum);
    //     })
    //     .error(function(data) {
    //         console.log(data);
    //         //toastr.error(data.ErrorMessage);
    //     })
    //     $location.url('/disbursal');
    // }


}]);

/***
Layout Partials.
By default the partials are loaded through AngularJS ng-include directive. In case they loaded in server side(e.g: PHP include function) then below partial 
initialization can be disabled and Layout.init() should be called on page load complete as explained above.
***/

/* Setup Layout Part - Header */
MetronicApp.controller('HeaderController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initHeader(); // init header
    });
}]);

/* Setup Layout Part - Sidebar */
MetronicApp.controller('SidebarController', ['lmsProcess', '$scope', '$rootScope', '$http', '$location', function(lmsProcess, $scope, $rootScope, $http, $location) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initSidebar(); // init sidebar
    });
    //Asset App ID View API 
   

}]);

/* Setup Layout Part - Quick Sidebar */
MetronicApp.controller('QuickSidebarController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        setTimeout(function() {
            QuickSidebar.init(); // init quick sidebar        
        }, 2000)
    });
}]);

/* Setup Layout Part - Theme Panel */
MetronicApp.controller('ThemePanelController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Demo.init(); // init theme panel
    });
}]);

/* Setup Layout Part - Footer */
MetronicApp.controller('FooterController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initFooter(); // init footer
    });
}]);

/* Setup Rounting For All Pages */
MetronicApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
    // Redirect any unmatched url
    $urlRouterProvider.otherwise("/userLogin");

    $stateProvider

    // UserLogin
        .state('UserLogin', {
        url: "/userLogin",
        templateUrl: "views/userLogin.html",
        data: { pageTitle: 'Login' },
        controller: "userLoginController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'dashboard',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                        // plugins.css.morrisCss,
                        // plugins.css.fontAwesomeCss,
                        // plugins.css.lineIconCss,
                        // plugins.css.bootstrapMinCss,
                        // plugins.css.bootstrapSwitchCss,

                        // plugins.css.morrisJS,
                        // plugins.css.raphealMinJS,
                        // plugins.css.jquerySparkline,

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/userLoginController.js',
                    ]
                });
            }]
        }
    })

    //leadDetailEntryController
    .state('leadDetailedEntry', {
        url: "/leadDetailedEntry",
        templateUrl: "views/leadDetailedEntry.html",
        data: { pageTitle: 'leadDetailedEntry' },
        controller: "leadDetailedEntryController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'LeadDetailEntry',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        //'../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/bootbox/bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/leadDetailedEntryController.js',
                    ]
                });
            }]
        }
    })



        // Dashboard
        .state('dashboard', {
            url: "/dashboard",
            templateUrl: "views/dashboard.html",
            data: { pageTitle: 'Dashboard' },
            controller: "DashboardController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'dashboard',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/DashboardController.js',
                    ]
                });
            }]
        }
    })

    //Leads Dashboard
    .state('roles', {
        url: "/roles",
        templateUrl: "views/roles.html",
        data: { pageTitle: 'roles List' },
        controller: "roledetailesController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'roles',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/DashboardController.js',
                        'js/controllers/rolesdetails.js',
                        'js/controllers/cvRoleController.js',
                    ]
                });
            }]
        }
    })

    // Field Invest Dashboard
    .state('userDetails', {
        url: "/userDetails",
        templateUrl: "views/userDetails.html",
        data: { pageTitle: 'userDetails' },
        controller: "userDetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'users',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/userDetailsController.js',
                         'js/controllers/cvUserController.js',
                    ]
                });
            }]
        }
    })

    // Field Invest Dashboard
    .state('country', {
        url: "/country",
        templateUrl: "views/countryDetails.html",
        data: { pageTitle: 'country Details' },
        controller: "countrydetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/countrydetailsController.js',
                         'js/controllers/cvCountryController.js',
                    ]
                });
            }]
        }
    })

    //Call Log
    .state('state', {
        url: "/state",
        templateUrl: "views/state.html",
        data: { pageTitle: 'state' },
        controller: "statedetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/statedetailsController.js',
                         'js/controllers/cvStateController.js',
                    ]
                });
            }]
        }
    })

    //Reassign Lead
    //Call Log
    .state('currency', {
        url: "/currency",
        templateUrl: "views/currency.html",
        data: { pageTitle: 'currency' },
        controller: "currencydetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/currencydetailesController.js',
                        'js/controllers/cvCurrencyController.js',
                    ]
                });
            }]
        }
    })

    //my Field Invest Dashboard
    .state('businesstype', {
        url: "/businesstype",
        templateUrl: "views/businesstype.html",
        data: { pageTitle: 'businesstype' },
        controller: "businesstypeController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/businesstypeController.js',
                         'js/controllers/cvBusinessTypeController.js',
                    ]
                });
            }]
        }
    })


    //my Field Invest result
    .state('purpose', {
        url: "/purpose",
        templateUrl: "views/purpose.html",
        data: { pageTitle: 'purpose' },
        controller: "purposedetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',


                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/purposedetailsController.js',
                         'js/controllers/cvPurposeController.js',
                    ]
                });
            }]
        }
    })

    //my Field Invest Dashboard
    .state('gender', {
        url: "/gender",
        templateUrl: "views/gender.html",
        data: { pageTitle: 'gender' },
        controller: "genderdetailesController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/genderdetailesController.js',
                         'js/controllers/cvGenderController.js',
                    ]
                });
            }]
        }
    })

    //Field Invest Agency Add
    .state('collateral', {
        url: "/collateral",
        templateUrl: "views/collateral.html",
        data: { pageTitle: 'FI-Agency-Add' },
        controller: "collateraldetailesController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/collateraldetailesController.js',
                         'js/controllers/cvCollateralController.js',
                    ]
                });
            }]
        }
    })

    //Field Invest Agency Detail View
    .state('constitution', {
        url: "/constitution",
        templateUrl: "views/constitution.html",
        data: { pageTitle: 'constitution' },
        controller: "constitutiondetailesController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
  '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/constitutiondetailesController.js',
                          'js/controllers/cvConstitutionController.js',
                    ]
                });
            }]
        }
    })

    //Product Management
    .state('schoolboard', {
        url: "/schoolboard",
        templateUrl: "views/schoolboard.html",
        data: { pageTitle: 'schoolboard' },
        controller: "schoolboarddetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
  '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/schoolboarddetailsController.js',
                        'js/controllers/cvSchoolBoardController.js',
                    ]
                });
            }]
        }
    })

    //Product Dashboard
    .state('religion', {
        url: "/religion",
        templateUrl: "views/religion.html",
        data: { pageTitle: 'religion' },
        controller: "religiondetailsController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
  '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/religiondetailsController.js',
                         'js/controllers/cvReligionController.js',
                    ]
                });
            }]
        }
    })

    //Add a Product
    .state('salutation', {
            url: "/salutation",
            templateUrl: "views/salutation.html",
            data: { pageTitle: 'salutation' },
            controller: "salutationdetailsController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'Leads',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                            '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                            '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                            '../assets/pages/scripts/ui-toastr.min.js',


                            'assets/global/plugins/clockface/css/clockface.css',
                            '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                            'assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                            'assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                            '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                            '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                            'assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                            'assets/global/plugins/clockface/js/clockface.js',
                            'assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                            '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                            '../assets/pages/scripts/components-date-time-pickers.min.js',

                            '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                            '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                            '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                            '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                            '../assets/global/css/components.min.css',
                            '../assets/global/css/plugins.min.css',
                            '../assets/layouts/layout/css/layout.min.css',
                            '../assets/layouts/layout/css/themes/darkblue.min.css',
                            '../assets/layouts/layout/css/custom.min.css',

                            '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                            '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                            '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                            '../assets/global/plugins/jquery.blockui.min.js',
                            '../assets/global/plugins/js.cookie.min.js',
                            '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                            // '../assets/pages/scripts/dashboard.min.js',
                            'js/controllers/salutationdetailsController.js',
                            'js/controllers/cvSalutationController.js',
                        ]
                    });
                }]
            }
        })
        //Product Eligibity Criteria
        .state('maritalstatus', {
            url: "/maritalstatus",
            templateUrl: "views/maritalstatus.html",
            data: { pageTitle: 'maritalstatus' },
            controller: "maritalstatusController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'Leads',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                            '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                            '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                            '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                            '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                            '../assets/global/css/components.min.css',
                            '../assets/global/css/plugins.min.css',
                            '../assets/layouts/layout/css/layout.min.css',
                            '../assets/layouts/layout/css/themes/darkblue.min.css',
                            '../assets/layouts/layout/css/custom.min.css',

                            '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                            '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                            '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                            '../assets/global/plugins/jquery.blockui.min.js',
                            '../assets/global/plugins/js.cookie.min.js',
                            '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                            '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                            '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                            '../assets/pages/scripts/ui-toastr.min.js',
                            // '../assets/pages/scripts/dashboard.min.js',
                            'js/controllers/maritalstatusController.js',
                            'js/controllers/cvMaritalStatusController.js',
                        ]
                    });
                }]
            }
        })

    //Product Credit Policy
    .state('taxstatus', {
        url: "/taxstatus",
        templateUrl: "views/taxstatus.html",
        data: { pageTitle: 'taxstatus' },
        controller: "taxstatusdetailesController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',


                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        // '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/taxstatusdetailsController.js',
                         'js/controllers/cvTaxStatusController.js',
                    ]
                });
            }]
        }
    })

    
        // Dashboard
        .state('cvBusinessType', {
            url: "/cvBusinessType/:type",
            templateUrl: "views/cvBusinessType.html",
            data: { pageTitle: 'cvBusinessType' },
            controller: "cvBusinessTypeController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvBusinessType',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvBusinessTypeController.js',
                    ]
                });
            }]
        }
    })
 
    
 .state('cvCollateral', {
            url: "/cvCollateral",
            templateUrl: "views/cvCollateral.html",
            data: { pageTitle: 'cvCollateral' },
            controller: "cvCollateralController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvCollateral',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvCollateralController.js',
                    ]
                });
            }]
        }
    })
   
    .state('cvConstitution', {
            url: "/cvConstitution/:core",
            templateUrl: "views/cvConstitution.html",
            data: { pageTitle: 'cvConstitution' },
            controller: "cvConstitutionController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvConstitution',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',
  '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvConstitutionController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvCountry', {
            url: "/cvCountry/:update",
            templateUrl: "views/cvCountry.html",
            data: { pageTitle: 'cvCountry' },
            controller: "cvCountryController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvCountry',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',
  '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvCountryController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvCurrency', {
            url: "/cvCurrency",
            templateUrl: "views/cvCurrency.html",
            data: { pageTitle: 'cvCurrency' },
            controller: "cvCurrencyController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvCurrency',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvCurrencyController.js',
                    ]
                });
            }]
        }
    }) 

.state('cvGender', {
            url: "/cvGender/:gendertext",
            templateUrl: "views/cvGender.html",
            data: { pageTitle: 'cvGender' },
            controller: "cvGenderController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvGender',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',
                              '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvGenderController.js',
                    ]
                });
            }]
        }
    }) 

.state('cvMaritalStatus', {
            url: "/cvMaritalStatus/:core",
            templateUrl: "views/cvMaritalStatus.html",
            data: { pageTitle: 'cvMaritalStatus' },
            controller: "cvMaritalStatusController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvMaritalStatus',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvMaritalStatusController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvPurpose', {
            url: "/cvPurpose",
            templateUrl: "views/cvPurpose.html",
            data: { pageTitle: 'cvPurpose' },
            controller: "cvPurposeController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvPurpose',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvPurposeController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvReligion', {
            url: "/cvReligion/:core",
            templateUrl: "views/cvReligion.html",
            data: { pageTitle: 'cvReligion' },
            controller: "cvReligionController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvReligion',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvReligionController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvRole', {
            url: "/cvRole/:mode",
            templateUrl: "views/cvRole.html",
            data: { pageTitle: 'cvRole' },
            controller: "cvRoleController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvRole',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvRoleController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvSalutation', {
            url: "/cvSalutation/:core",
            templateUrl: "views/cvSalutation.html",
            data: { pageTitle: 'cvSalutation' },
            controller: "cvSalutationController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvSalutation',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvSalutationController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvSchoolBoard', {
            url: "/cvSchoolBoard",
            templateUrl: "views/cvSchoolBoard.html",
            data: { pageTitle: 'cvSchoolBoard' },
            controller: "cvSchoolBoardController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvSchoolBoard',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvSchoolBoardController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvState', {
            url: "/cvState/:module",
            templateUrl: "views/cvState.html",
            data: { pageTitle: 'cvState' },
            controller: "cvStateController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvState',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvStateController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvTaxStatus', {
            url: "/cvTaxStatus/:core",
            templateUrl: "views/cvTaxStatus.html",
            data: { pageTitle: 'cvTaxStatus' },
            controller: "cvTaxStatusController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvTaxStatus',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvTaxStatusController.js',
                    ]
                });
            }]
        }
    }) 
.state('cvUser', {
            url: "/cvUser/:user",
            templateUrl: "views/cvUser.html",
            data: { pageTitle: 'cvUser' },
            controller: "cvUserController",
            resolve: {
                deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'cvUser',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '../assets/global/plugins/morris/morris.css',
                            '../assets/global/plugins/morris/morris.min.js',
                            '../assets/global/plugins/morris/raphael-min.js',
                            '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                          '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',
                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                        '../assets/global/plugins/angularjs/plugins/angular-ui-router.min.js',

                        '../assets/global/plugins/bootbox/bootbox.min.js',
                        '../assets/pages/scripts/ui-bootbox.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/cvUserController.js',
                    ]
                });
            }]
        }
    }) 

.state('newPurchaseOrder', {
        url: "/newPurchaseOrder/:purchase",
        templateUrl: "views/newPurchaseOrder.html",
        data: { pageTitle: 'newurchaseOrder' },
        controller: "newPurchaseOrderController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/newPurchaseOrderController.js',
                     ]
                });
            }]
        }
    })

.state('purchageorder', {
        url: "/purchageorder",
        templateUrl: "views/purchageorder.html",
        data: { pageTitle: 'purchageorder' },
        controller: "purchageController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        // 'js/controllers/schoolboarddetailsController.js',
                        'js/controllers/purchageController.js',
                    ]
                });
            }]
        }
    })

.state('proformaorder', {
        url: "/proformaorder",
        templateUrl: "views/proformaorder.html",
        data: { pageTitle: 'proformaorder' },
        controller: "proformaController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        // 'js/controllers/schoolboarddetailsController.js',
                        'js/controllers/proformaController.js',
                    ]
                });
            }]
        }
    })

.state('newProformaOrder', {
        url: "/newProformaOrder/:text",
        templateUrl: "views/newProformaOrder.html",
        data: { pageTitle: 'newProformaOrder' },
        controller: "newProformaOrderController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/newProformaOrderController.js',
                         
                    ]
                });
            }]
        }
    })

.state('proformaInovice', {
        url: "/proformaInovice",
        templateUrl: "views/proformaInovice.html",
        data: { pageTitle: 'proformaInovice' },
        controller: "proformaInoviceController",
        resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'Leads',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                        '../assets/global/plugins/morris/morris.css',
                        '../assets/global/plugins/morris/morris.min.js',
                        '../assets/global/plugins/morris/raphael-min.js',
                        '../assets/global/plugins/jquery.sparkline.min.js',
                        '../assets/global/plugins/clockface/css/clockface.css',
                        '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
                        '../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
                        '../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
                        '../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

                        '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                        '../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
                        '../assets/global/plugins/clockface/js/clockface.js',
                        '../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
                        '../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',

                        '../assets/pages/scripts/components-date-time-pickers.min.js',

                        '../assets/global/plugins/font-awesome/css/font-awesome.min.css',
                        '../assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
                        '../assets/global/plugins/bootstrap/css/bootstrap.min.css',
                        '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

                        '../assets/global/css/components.min.css',
                        '../assets/global/css/plugins.min.css',
                        '../assets/layouts/layout/css/layout.min.css',
                        '../assets/layouts/layout/css/themes/darkblue.min.css',
                        '../assets/layouts/layout/css/custom.min.css',

                        '../assets/global/plugins/bootstrap-toastr/toastr.min.css',
                        '../assets/global/plugins/bootstrap-toastr/toastr.min.js',
                        '../assets/pages/scripts/ui-toastr.min.js',

                        '../assets/global/plugins/bootstrap/js/bootstrap.min.js',
                        '../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
                        '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
                        '../assets/global/plugins/jquery.blockui.min.js',
                        '../assets/global/plugins/js.cookie.min.js',
                        '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

                        '../assets/pages/scripts/dashboard.min.js',
                        'js/controllers/proformaInvoice.js',
                         
                    ]
                });
            }]
        }
    })
}]);

/* Init global settings and run the app */
MetronicApp.run(["$rootScope", "settings", "$state", function($rootScope, settings, $state) {
    $rootScope.$state = $state; // state to be accessed from view
    $rootScope.$settings = settings; // state to be accessed from view
}]);
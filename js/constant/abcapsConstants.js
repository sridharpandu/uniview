angular.module('MetronicApp')
.constant('constants', (function () {
    var constants = {
          
          //Dashboard:
		dashboard : "Dashboard",
		leadList : "LEAD LIST",
		leadStatus : "LEAD STATUS",
		constitution : "LEAD LISTt BY CONSTITUTION",
		inSal : "IN SAL",
		inSep : "IN SEP",
		inSen : "IN SEN",
		coPro : "CO PRO",
		coPar : "CO PAR",
		coPvt : "CO PVT",
		coPub : "CO PUB",
		coTru : "CO TRU",
		coGro : "CO GRO",
		coHuf : "CO HUF",
		
          };

    return function (name) {
        return constants[name];
    };
}()))
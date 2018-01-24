//1.
describe('mortgageDetailsController', function () {
    //2.
    beforeEach(module('MetronicApp'));
    //3.
    it('scopeTestSpec',
        //4.
        inject(function ($controller, $rootScope) {
            var $scope = $rootScope.$new();
            $controller('mortgageDetailsController', 
		{
                $scope: $scope
            });
            $scope.pwd = "mohanrajChandrasekar";
            $scope.testCheck();
            //5.
            expect($scope.strgth).toBe('strong');
            
        }));
            //6.
// it('scopeTestSpecFunction',
//         inject(function ($controller, $rootScope) {
//             var $scope = $rootScope.$new();
//             $controller('mortgageDetailsController', {
//                 $scope: $scope
//             });
//             expect($scope.lower('MAHESH')).toEqual('mahesh');
//         }));
});
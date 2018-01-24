//1.
describe('mycontroller', function () {
    //2.
    beforeEach(module('appmodule'));
    //3.
    it('scopeTestSpec',
        //4.
        inject(function ($controller, $rootScope) {
            var $scope = $rootScope.$new();
            $controller('mycontroller', 
		{
                $scope: $scope
            });
            //5.
            expect($scope.Employee.EmpName).toEqual('MS');
            
        }));
            //6.
it('scopeTestSpecFunction',
        inject(function ($controller, $rootScope) {
            var $scope = $rootScope.$new();
            $controller('mycontroller', {
                $scope: $scope
            });
            expect($scope.lower('MAHESH')).toEqual('mahesh');
        }));
});

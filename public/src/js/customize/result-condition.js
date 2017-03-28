// Seach Main controller
_app.controller('ConditionCtrl', function ($rootScope, $scope, $http, $location) {
	var params = window.location.search;
	var sURLVariables = params.split(/[&||?]/);
	var paramsArr = {};
	for (var i = 0; i < sURLVariables.length; i ++) {
        var paramName = sURLVariables[i],
            sParameterName = (paramName || '').split('=');
        if (sParameterName.length == 2){
        	paramsArr[sParameterName[0]] = sParameterName[1];
        }
    }
	console.log(paramsArr);

	$scope.listLocation = function(id_city,id_location){
		_fetch.get('/api/conditionSearch', {
			id_city : id_city,
			id_location : id_location
		}, function(res) {
			if (res.location || res.city){
				$scope.$apply(function () {
					$scope.listname = res.city +' / '+ res.location;
				});
			}
		});
	}
	
});
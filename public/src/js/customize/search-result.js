// Seach Main controller
_app.controller('SearchResultCtrl', function ($rootScope, $scope, $http, $location) {
	var params = window.location.search;
	var sURLVariables = params.split(/[&||?]/);
	var paramsArr = {};
	for (var i = 0; i < sURLVariables.length; i += 1) {
        var paramName = sURLVariables[i],
            sParameterName = (paramName || '').split('=');
        if (sParameterName.length == 2){
        	paramsArr[sParameterName[0]] = sParameterName[1];
        }
    }
	// console.log(paramsArr);
	$scope.results = [];
	$scope.doMainSearch = function(keyword){
		if (typeof(keyword) == 'undefined'){
			return;
		}
		_fetch.get('/api/search', {
			keyword: keyword
		}, function(res){
			console.log(res);
			if (res.data){
				$scope.$apply(function () {
					$scope.results = res.data;
				});
			}
		});
	}

	if (typeof(paramsArr['action']) != 'undefined'){
		switch (paramsArr['action']){
			case 'main-search': {
				$scope.doMainSearch(paramsArr['keyword']);
				break;
			}
		}
	}
});
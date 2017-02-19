// Seach Main controller
_app.controller('SearchResultCtrl', function ($rootScope, $scope, $http, $location) {
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
					$('#main-resutls').show();
				});
			}
		});
	}

	// results search all
	$scope.doMainResultSearch = function(id_location, id_category){
		// if (typeof(id_location) == 'undefined') {
		// 	return;
		// }
		if (typeof(id_location) != 'undefined' || typeof(id_category) != 'undefined' ){
			$scope.searchString = id_location;
			$scope.searchCategory = id_category;
		}
		// if (typeof(id_category) != 'undefined' ){
		// }
		console.log('location:'+$scope.searchString);
		console.log('catess:'+$scope.searchCategory);

		_fetch.get('/api/all', {
			id_location : id_location,
			id_category : id_category
		}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.results = res.data;
					$('#main-resutls').show();
				});
			}
		});
	}


	if (typeof(paramsArr['action']) != 'undefined'){
		switch (paramsArr['action']){
			case 'main-search': 
				$scope.doMainSearch(paramsArr['keyword']);
				break;

			case 'ontop':
				console.log('case');
				$scope.doMainResultSearch(paramsArr['id_location']);
				break;
		}
	}
});
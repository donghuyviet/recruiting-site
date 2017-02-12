// Seach Main controller
_app.controller('SearchCtrl', function ($rootScope, $scope, $http) {
	console.log('search process');

	$scope.keyword = [];
	$scope.listKeyword = function(){
		_fetch.get('/api/keyword', {}, function(res) {
			console.log(res);
		});
	}

	// result search keywork
	$scope.resultSeach = function(){
		_fetch.get('api/search', {}, function(res){
			console.log(res);
		});
	}

});
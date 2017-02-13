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
	$scope.resultSeach = function(key){
		_fetch.get('api/search', {}, function(res){
			console.log(res);
		});
	}

});
_app.filter('searchFor', function(){

	return function(arr, searchString){

		if(!searchString){
			return arr;
		}

		var result = [];

		searchString = searchString.toLowerCase();

		angular.forEach(arr, function(item){

			if(item.title.toLowerCase().indexOf(searchString) !== -1){
				result.push(item);
			}

		});

		return result;
	};

});
// Seach Main controller
_app.controller('SearchCtrl', function ($rootScope, $scope, $http) {
	console.log('search process');
	$scope.searchString = '';

	$scope.listKeyword = function(){
		_fetch.get('/api/keyword', {}, function(res) {
			// console.log(res);
			if (res.data){
				$scope.$apply(function () {
					$scope.featuredKeyword = res.data;
					$('#main-search').show();
				});
			}
		});
	}
	$scope.listKeyword();

	$scope.doSearch = function(keyword){
		if (typeof(keyword) != 'undefined'){
			$scope.searchString = keyword;
		}
		window.location.assign('/search/career?action=main-search&keyword='+$scope.searchString);
		// _fetch.get('api/search', {
		// 	keyword: $scope.searchString
		// }, function(res){
		// 	console.log(res);
		// });
	}

});
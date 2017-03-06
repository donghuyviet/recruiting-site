// Seach Main controller
_app.controller('LocationCtrl', function ($rootScope, $scope, $http) {
	console.log('search process');
	
	$scope.listPopular = function(){
		_fetch.get('/api/keyword', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.popularArea = res.data;
			}
		});
	}
	$scope.listPopular();

	$scope.searchString = {
		isActive : true,
		all:false,
		id_district: 0
	}

	$scope.listDistrict = function(){
		_fetch.get('/api/district', {}, function(res) {
			console.log(res);
			if (res.district){
				$scope.$apply(function () {
					$scope.districts = res.district;
					
				});
			}
			$scope.location = [];
				angular.forEach($scope.district, function(loca) {
					angular.forEach(loca.location, function(locaList) {
					$scope.location.push(locaList);
					console.log($scope.location);
					})
				})
		});
	}

	$scope.listDistrict();
	
	$scope.doClick = function (){
		$('#hidden-bottom').show();
	}

	$scope.doSearchKey = function(keyword){
		if(typeof(keyword) != 'undefined'){
			$scope.searchString = keyword;
		}
		window.location.assign('/search/career?action=main-search&keyword='+$scope.searchString);
	}

	$scope.doSearch = function(){
		
		console.log($scope.searchString);
		window.location.assign('/search/condition?action=cond-search&keyword='+$scope.searchString);
		// _fetch.get('api/search', {
		// 	keyword: $scope.searchString
		// }, function(res){
		// 	console.log(res);
		// });
	}

});
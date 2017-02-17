// Seach Main controller
_app.controller('SearchLocationCtrl', function ($rootScope, $scope, $http) {
	console.log('search filter process');
	$scope.searchString = '';

	// search theo location 
	$scope.listLocation = function(){
		_fetch.get('/api/all/location', {}, function(res) {
			console.log(res);
			if (res.data){
				$scope.$apply(function () {
					$scope.location = res.data;
					$('#main-search').show();
				});
			}
		});
	}
	$scope.listLocation();

	// search theo category
	$scope.listCategory = function () {
		_fetch.get('/api/all/category', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.category = res.data;
					$('#main-category').show();
				});
				$scope.checkAll = function(){
					console.log('checkAll');
					if($scope.selectedAll){
						$scope.selectedAll = true;
						console.log($scope.selectedAll);
					}else{
						$scope.selectedAll = false;
						console.log($scope.selectedAll);
					}
					angular.forEach($scope.category, function (item) {
			            item.Selected = $scope.selectedAll;
			        });
				};
			}
		});
	}
	$scope.listCategory();

	// search benefit
	$scope.listBenefit = function(){
		_fetch.get('/api/all/benefit', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.benefit = res.data;
					$('#main-benefit').show();
				});
			}
		});
	}
	$scope.listBenefit();

	// search Salary
	$scope.listSalary = function(){
		_fetch.get('/api/all/salary', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.salary = res.data;
					$('#main-salary').show();
				});
			}
		});
	}

	$scope.listSalary();

	$scope.doSearchFilter = function(location){
		console.log('doSearchFilter');
		if (typeof(location) != 'undefined'){
			$scope.searchString = location;
		}
		console.log('key:'+$scope.searchString);
		window.location.assign('/search/career?action=main-search&location='+$scope.searchString);
		// _fetch.get('api/search', {
		// 	keyword: $scope.searchString
		// }, function(res){
		// 	console.log(res);
		// });
	}

});
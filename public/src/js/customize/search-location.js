// Seach Main controller
_app.controller('SearchLocationCtrl', function ($rootScope, $scope, $http) {
	console.log('search filter process');
	$scope.searchString = '';
	$scope.searchCategory = '';
	$scope.searchBenefit = '';

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
					$('#main-search-category').show();
				});
				// $scope.checkAll = function(){
				// 	console.log('checkAll');
				// 	if($scope.selectedAll){
				// 		$scope.selectedAll = true;
				// 		console.log($scope.selectedAll);
				// 	}else{
				// 		$scope.selectedAll = false;
				// 		console.log($scope.selectedAll);
				// 	}
				// 	angular.forEach($scope.category, function (item) {
			 //            item.Selected = $scope.selectedAll;
			 //        });
				// };
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
					$('#main-search').show();
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
					$('#main-search').show();
				});
			}
		});
	}

	$scope.listSalary();

	$scope.doSearchFilter = function(id_location ,id_category, id_benefit){
		console.log('doSearchFilter');
		if (typeof(id_location) != 'undefined' || typeof(id_category) != 'undefined' || typeof(id_benefit) != 'undefined'){
			$scope.searchString = id_location;
			$scope.searchCategory = id_category;
			$scope.searchBenefit= id_benefit;
		}
		console.log('key:'+$scope.searchString);
		console.log('cate:'+$scope.searchCategory);
		console.log('benefit:'+$scope.searchBenefit);
		window.location.assign('/search/career?action=ontop&id_location='+$scope.searchString+'&id_category='+$scope.searchCategory+'&id_benefit='+$scope.searchBenefit);
		// _fetch.get('api/all', {
		// 	id_location: $scope.searchString,
		// 	id_category: $scope.searchCategory,
		// 	id_benefit: $scope.searchBenefit,
		// }, function(res){
		// 	console.log(res);
		// });
	}

});
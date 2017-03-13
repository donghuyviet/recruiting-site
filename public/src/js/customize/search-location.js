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
					// $('#main-search').show();
				});
			}
		});
	}
	$scope.listLocation();

	// search theo category
	$scope.searchCategory = {
		isActive : true,
		id: 0,
		all: false,
		salary_unit:0,
		salary_from:0,
		id_benefit: 0
	}
	$scope.listCategory = function () {
		_fetch.get('/api/all/category', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.category = res.data;
				});
			}
		});
	}
	$scope.listCategory();

	// search benefit
	$scope.searchBenefit = '';
	$scope.listBenefit = function(){
		_fetch.get('/api/all/benefit', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.benefit = res.data;
					// $('#main-search').show();
				});
			}
		});
	}
	$scope.listBenefit();

	// search Salary
	// $scope.searchSalary = {
	// 	to: 0,
	//     from: 0,
	// }
	// $scope.searchSalary = '';
	$scope.listSalary = function(){
		_fetch.get('/api/all/salary', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.salary = res.data;
					// $('#main-search').show();
				});
			}
		});
	}

	$scope.listSalary();

	$scope.doSearchFilter = function(keyword){
		if (typeof(keyword) != 'undefined'){
			$scope.searchString = keyword;
		}
		// console.log('doSearchFilter');
		// console.log('key:'+$scope.searchString);
		// console.log('cate:'+$scope.searchCategory.id);
		// console.log('all:'+$scope.searchCategory.all);
		// console.log('benefit:'+$scope.searchBenefit);
		// console.log('salary:'+$scope.searchCategory.salary_unit);
		// console.log('salary:'+$scope.searchCategory.salary_unit);

		window.location.assign('/search/career?action=ontop&id_location='+$scope.searchString+'&id_category='+$scope.searchCategory.id+'&id_benefit='+$scope.searchBenefit+'&salary_unit='+$scope.searchCategory.salary_unit.unit+'&salary_from='+$scope.searchCategory.salary_unit.from);
	}

});
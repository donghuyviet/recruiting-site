// Seach Main controller
_app.controller('zenkokuCtrl', function ($rootScope, $scope, $http) {
	console.log('search zenkokuCtrl Start...!');

	// search theo category
	$scope.searchCategory = {
		isActive : true,
		id: 0,
		all: false,
		salary_unit:0,
		salary_from:0,
		id_benefit: 0,
	}
	$scope.listDistrict = function () {
		_fetch.get('/api/district', {}, function(res){
			console.log(res);
			if(res.district){
				$scope.$apply(function(){
					$scope.district = res.district;
				});
			}
		});
	}
	$scope.listDistrict();

	$scope.searchString = ''
	$scope.dosearch = function(keyword){
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

		window.location.assign('/search/fillter?city='+$scope.searchString);
	}

});
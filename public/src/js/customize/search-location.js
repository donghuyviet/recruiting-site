// Seach Main controller
_app.controller('SearchLocationCtrl', function ($rootScope, $scope, $http, $location) {
	console.log('search filter process');
	// param
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

	$scope.searchString = '';
	$scope.searchkeyword = '';
	// search theo location 
	$scope.listCitys = function(id_city){
		_fetch.get('/api/getLocationbyCity',  {
			id_city : id_city
		}, function(res) {
			console.log(res);
			if (res.city.id){
					$scope.ListCity = res.city;
					// console.log('city'+$scope.ListCity);
			}
			if(res.location){
				$scope.ListLocation = res.location;
				// console.log('loca'+$scope.ListLocation);
			}
		});
	}
	$scope.listCitys();

	if (typeof(paramsArr['action']) != 'undefined'){
		switch (paramsArr['action']){
			case 'main-filter': 
				$scope.listCitys(paramsArr['id_city']);
				break;
		}
	}

	// search theo category
	
	$scope.searchCategory = {
		isActive : true,
		id: '',
		all: false,
		salary_unit:'',
		salary_from:0,
		id_benefit: 0,
		id_time:'' 
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
	$scope.searchBenefit = {
		id_bene: ''
	}
	$scope.listBenefit = function(){
		_fetch.get('/api/all/group_benefit', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.benefit_group = res.data;
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
			// console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.salary = res.data;
					// $('#main-search').show();
				});
			}
		});
	}

	$scope.listSalary();

	$scope.listTime = function(){
		_fetch.get('/api/all/time', {}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.time = res.data;
					// $('#main-search').show();
				});
			}
		});
	}

	$scope.listTime();

	$scope.doSearchFilter = function(keyword){
		if (typeof(keyword) != 'undefined'){
			$scope.searchString = keyword;
		}
		
		// console.log('key:'+$scope.searchString);
		// console.log('cate:'+$scope.searchCategory.id);
		// console.log('all:'+$scope.searchCategory.all);
		// console.log('benefit:'+$scope.searchBenefit.id_bene.id);
		// console.log('salary:'+$scope.searchCategory.salary_unit.unit);
		// console.log('salary:'+$scope.searchCategory.salary_unit.from);
		// console.log('time:'+$scope.searchCategory.id_time);
		// console.log('keyword:'+$scope.searchkeyword);

		window.location.assign('/search/career?action=ontop&id_location='+$scope.searchString+'&id_category='+$scope.searchCategory.id+'&id_benefit='+$scope.searchBenefit.id_bene.id+'&salary_from='+$scope.searchCategory.salary_unit.from+'&id_time='+$scope.searchCategory.id_time+'&keyword='+$scope.searchkeyword);
	}

});
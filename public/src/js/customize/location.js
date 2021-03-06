// Seach Main controller
_app.controller('LocationCtrl', function ($rootScope, $scope, $http) {
	console.log('search process');
	$scope.isLoading = false;
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
		id_district: 0,
		id_city:0,
		id_location: 0
	}

	$scope.dem = 0;
	$scope.listDistrict = function(){
		_fetch.get('/api/district', {}, function(res) {
			console.log(res);
			if (res.district){
				$scope.$apply(function () {
					$scope.districts = res.district;
					
				});
			}
		});
	}
	$scope.rowClass = function(item, index,style){
         if(index == 0){
         	if(style === 1)
             	return 'active';
         	else
         		return 'tab-pane active';
         }
        if(style === 1)
        	return '';
    	else 
    		return 'tab-pane';
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

	$scope.addCondition = function(){
		
		// console.log($scope.searchString.id_city);
		// console.log($scope.searchString.id);
		window.location.assign('/search/condition?action=cond-search&id_city='+$scope.searchString.id_city+'&id_location='+$scope.searchString.id);
	}
	$scope.SearchCondition = function(){
		
		// console.log($scope.searchString.id_city);
		// console.log($scope.searchString.id);
		window.location.assign('/search/career?action=cond-search&id_location='+$scope.searchString.id+'&id_city='+$scope.searchString.id_city);
	}

});
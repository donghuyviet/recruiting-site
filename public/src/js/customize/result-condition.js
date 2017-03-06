// Seach Main controller
_app.controller('ConditionCtrl', function ($rootScope, $scope, $http, $location) {
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


	// results search all
	$scope.doMainResultSearch = function(id_location, id_category){

		_fetch.get('/api/all', {
			id_location : id_location,
			id_category : id_category
		}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.results = res.data;
					$('#main-resutls').show();
				});
			}
		});
	}


	if (typeof(paramsArr['action']) != 'undefined'){
		switch (paramsArr['action']){
			case 'cond-search': 
				$scope.doMainSearch(paramsArr['keyword']);
				break;

			
		}
	}
});
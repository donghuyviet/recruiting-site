_app.controller('SearchTrain', function ($rootScope, $scope, $http) {
	$scope.listTrain = function(){
		_fetch.get('/api/rosen', {}, function(res) {
			if (res.location){
				$scope.$apply(function () {
					$scope.listTrains = res.location;
				});
			}
		});
	}
	$scope.getstation = function(id){
		_fetch.get('/api/station', {id_router:parseInt(id)}, function(res) {
			if (res.data){
				$scope.$apply(function () {
					$scope.stations = res.data;
					$scope.router = res.router;
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
    };
	$scope.listTrain();
});
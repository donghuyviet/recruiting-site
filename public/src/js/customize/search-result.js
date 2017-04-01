// Seach Main controller
_app.controller('SearchResultCtrl', function ($rootScope, $scope, $http, $location) {
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
	$scope.doMainSearch = function(keyword){
		if (typeof(keyword) == 'undefined'){
			return;
		}
		_fetch.get('/api/search', {
			keyword: keyword
		}, function(res){
			console.log(res);
			if (res.data){
				$scope.$apply(function () {
					$scope.results = res.data;
					$('#main-resutls').show();
				});
			}
		});
	}

	// results search all
	$scope.doMainResultSearch = function(id_location, id_category,id_benefit,salary_unit,salary_from,id_time,keyword){

		_fetch.get('/api/all', {
			id_location : id_location,
			id_category : id_category,
			id_benefit : id_benefit,
			salary_unit : salary_unit,
			salary_from : salary_from,
			id_time : id_time,
			keyword : keyword
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


	// search location result
	$scope.SearchResult = function(id_location, id_city){

		_fetch.get('/api/all', {
			id_location : id_location,
			id_city : id_city
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
	// results search all
	$scope.SearchResult = function(id_location, id_city){

		_fetch.get('/api/reaSearch', {
			id_location : id_location,
			id_city : id_city
		}, function(res){
			console.log(res);
			if(res.data){
				$scope.$apply(function(){
					$scope.results = res.data;
				});
			}
		});
	}

	if (typeof(paramsArr['action']) != 'undefined'){
		switch (paramsArr['action']){
			case 'main-search': 
				$scope.doMainSearch(paramsArr['keyword']);
				break;

			case 'ontop':
				// console.log('case');
				$scope.doMainResultSearch(paramsArr['id_location'],paramsArr['id_category'],paramsArr['id_benefit'],paramsArr['salary_unit'],paramsArr['salary_from'],paramsArr['id_time'],paramsArr['keyword']);
				break;
			case 'cond-search':
				// console.log('case');
				$scope.SearchResult(paramsArr['id_location'],paramsArr['id_city']);
				break;
		}
	}
	// apply jobs list
	$("body").on("click",".apply-job-button",function () {
        var jobID = $(this).attr("data-id");
        $scope.apply(jobID,$(this));
    });

    $scope.apply = function(jobID,element){
        var data = {jobID:jobID};
        _fetch.post("/search/career/apply",data,function (res) {
			console.log('apply'+res);
            if(res.status=="OK"){
                element.parent().html(res.applyStatus);
            }else{
                alert(res.message);
            }
        });
    }
});
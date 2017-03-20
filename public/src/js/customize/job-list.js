// Seach Main controller
_app.controller('JobListCtrl', function ($rootScope, $scope, $http) {
    $("body").on("click",".apply-job-button",function () {
        var jobID = $(this).attr("data-id");
        $scope.apply(jobID,$(this));
    });

    $scope.apply = function(jobID,element){
        var data = {jobID:jobID};
        _fetch.post("/jobs/apply",data,function (res) {
            if(res.status=="OK"){
                element.parent().html(res.applyStatus);
            }else{
                alert(res.message);
            }
        });
    }
});
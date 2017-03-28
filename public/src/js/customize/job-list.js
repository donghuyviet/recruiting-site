// Seach Main controller
// _app.controller('JobListCtrl', function ($rootScope, $scope, $http) {
//     $("body").on("click",".apply-job-button",function () {
//         var jobID = $(this).attr("data-id");
//         $scope.apply(jobID,$(this));
//     });

//     $scope.apply = function(jobID,element){
//         var data = {jobID:jobID};
//         _fetch.post("/jobs/apply",data,function (res) {
//             if(res.status=="OK"){
//                 element.parent().html(res.applyStatus);
//             }else{
//                 alert(res.message);
//             }
//         });
//     }
// });
_app.controller('ListUserApply', function ($rootScope, $scope, $http) {
    $('#listuserapply').on('change', function() {
        $scope.applyuser(this.value);
    });
    $scope.applyuser = function(jobID){
        var data = {id_job:jobID};
        _fetch.post("/jobs/userapply",data,function (res) {
            $scope.$apply(function () {
                $scope.ListUser = res;
            });
        });
    }
    $scope.applyuser($("#listuserapply").val());
});
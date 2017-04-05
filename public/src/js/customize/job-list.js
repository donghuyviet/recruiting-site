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
    $scope.confirm = function ($event , user){
        var data = {name: user.name, mail: user.email, id_apply: user.id_job_applicant };
        $.ajax({
            type: "POST",
            data: data,
            url: '/jobs/sendmail',
            beforeSend: function() {
               $('#'+ $event.currentTarget.id).button('loading');
            },
            success: function(res) {
                if(res.status=="OK"){                 
                    $('#' + $event.currentTarget.id).text('Accepted');                            
                    $( "#load_denied_" + user.user_apply ).remove();                  
                }
                else
                {
                    alert(res.message);
                }
            }
        })
    }
    $scope.denied = function ($event , user){
        var data = { id_apply: user.id_job_applicant };
        $.ajax({
            type: "POST",
            data: data,
            url: '/jobs/denied',
            beforeSend: function() {
                var $this = $(this);
               $('#' + $event.currentTarget.id).button('loading');
            },
            success: function(res) {
                if(res.status=="OK"){
                    setTimeout(function() {
                        $('#' + $event.currentTarget.id).text('denied');
                        $( "#apply_user_" + user.user_apply).remove();   
                   }, 2000);

                }
                else
                {
                    alert(res.message);
                }
            },
        })

    }
    $scope.applyuser($("#listuserapply").val());
});
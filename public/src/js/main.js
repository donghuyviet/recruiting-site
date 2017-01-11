$( function() {
    /*
     *   check window scroll
     */
    $(window).scroll(function() {
        if ($(document).scrollTop() > 70) {
            $('body').addClass('padding-top');
            $('.navbar.top').removeClass('navbar-static').addClass('navbar-fixed-top');
            // $('.navbar.bottom').addClass('navbar-static').removeClass('navbar-fixed-bottom');
        }
        else {
            $('body').removeClass('padding-top');
            $('.navbar.top').addClass('navbar-static').removeClass('navbar-fixed-top');
            // $('.navbar.bottom').removeClass('navbar-static').addClass('navbar-fixed-bottom');
        }
    });

    /*
    *   delete module
     */
    var _id;
    $('body').on('click', '.close-module', function() {
        //$(this).parents('.box').fadeOut(300);
        _id = $(this).attr('module-id');
        $( "body" ).trigger( "delete-module", ['lasd'] );
    })

    $( "body" ).on( "delete-module", function(a) {

        _fetch.get('top/moduleAction/del/'+_id+'/_', {}, function(res) {
            location.reload();
        })
    });
    //Event click bottom menu
    $('.ul-setting .dropdown-menu li a').click(function (e) {
        var target = $(e.target);
        var target_id = target.attr('id');
        console.log(target_id);
        switch(target_id) {
            case 'personal-registration':
                $('#home_setting').find('.modal-title').html('個人情報登録');
                $('#home_setting').find('.modal-body').html('<iframe id="pmRegisterIfram" src="/registerpersonal" ></iframe>');
                $('#home_setting').modal({backdrop: 'static', keyboard: false});
                break;
            case 'setting-busyo':
                $('#home_setting').find('.modal-title').html('部署マスター');
                $('#home_setting').find('.modal-body').html('<iframe  src="/busyo" ></iframe>');
                $('#home_setting').modal({backdrop: 'static', keyboard: false});
                break;
            default:
                break;
        }
    });
    //Listen Socket server to show Notifications
    if($("input[name='user_login_id']").length){
        var userID = $("input[name='user_login_id']").val();
        var socket = io.connect("https://partout.club:8000/");
        socket.on('connect', function(){
            socket.emit('adduser', userID);
        });
        socket.on('notification', function(msg){
            var noty = new SNSNotification(msg.user+" - "+msg.title,msg.text);
            noty.show();
        });
    }
});

var _main = {
    toast_error : function(title, msg){
        $.toast({
            text : msg,
            heading: title,
            showHideTransition: 'slide',
            icon: 'error',
            position : 'top-right',
            stack : 5,
            hideAfter : 3000,
            loader: false
        })
    },
    toast_succes : function(title, msg){
        $.toast({
            text : msg,
            heading: title,
            showHideTransition: 'slide',
            icon: 'success',
            position : 'top-right',
            stack : 5,
            hideAfter : 3000,
            loader: false
        })
    },
    toast_warning : function(title, msg){
        $.toast({
            text : msg,
            heading: title,
            showHideTransition: 'slide',
            icon: 'warning',
            position : 'top-right',
            stack : 5,
            hideAfter : 3000,
            loader: false
        })
    },
}

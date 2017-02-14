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

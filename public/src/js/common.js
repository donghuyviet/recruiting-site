$( function() {
    $('body').on('click', 'ul.pagination li.item', function(){
        $('ul.pagination').find('li.active').removeClass('active');
        $(this).addClass('active');
    });

    $('body').on('click', '.close-popup', function(){
        console.log(1);
        $('#screenOver').hide();
    });

    var uri = window.location.pathname ;

    $('.header-menu a').each(function(){
        var path = $(this).attr('href');

        if(path.trim() == uri.trim() ) {
            $(this).parents('li.root').addClass('active');
        }

    })


})

function navResetActice(){
    $('ul.pagination').find('li.active').removeClass('active');
}

function setLiActive() {
    $('ul.pagination li.item:first').addClass('active');
}

function setLiActiveP(page) {
    $('ul.pagination li:eq('+(page+1)+')').addClass('active');
}

function setLiActiveLast() {
    $('ul.pagination li.item:last').addClass('active');
}

function _ajax(url, method, success, error){
    Pace.restart();
    $.ajax({
        url: url,
        type: method,
        success: function(res) {
            success(res);
        },
        error: function(err) {
            if(error) {
                error(err);
            } else{
                alert('Some error when load data from server'); return false;
            }
        }
    });
}

function _ajaxGet(url, success, error){
    Pace.restart();
    $.ajax({
        url: url,
        type: 'GET',
        success: function(res) {
            success(res);
        },
        error: function(err) {
            if(error) {
                error(err);
            } else{
                alert('Some error when load data from server'); return false;
            }
        }
    });
}

function _ajaxPost(url, data, success, error){
    Pace.restart();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function(res) {
            success(res);
        },
        error: function(err) {
            if(error) {
                error(err);
            } else{
                alert('Some error when load data from server'); return false;
            }
        }
    });
}

function showAlert(title, msg, cb){
    $.alert({
        title: title,
        content: msg,
        confirm: function(){
            if(cb){ cb();}
        }
    });
}

function showConfirm(title, msg, cb, cb2){
    $.confirm({
        title: title,
        content: msg,
        confirm: function(){
            if(cb){ cb();}
        },
        cancel: function(){
            if(cb2){ cb2();}
        }
    });
}

function goTop(x){
    x = (x === undefined) ? 0 : x;
    $("html, body").animate({ scrollTop: x }, 500);
    return false;
}
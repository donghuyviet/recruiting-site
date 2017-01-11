
var _fetch = {};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

_fetch.get = function(api, data, suc,error, obj){
    freeze(obj, true);
    Pace.restart();

    $.ajax({
        method: "GET",
        url: api,
        data: data,
        success : function( msg ) {
            freeze(obj, false);
            if( $.isFunction(suc) ) { suc(msg)}
        },
        error:  function(msg){
            freeze(obj, false);
            if( $.isFunction(error) ) { error(msg)}
        }
        })


}
_fetch.post = function( api, data, suc,error, obj ) {
    freeze(obj, true);
    Pace.restart();

    $.ajax({
        method: "POST",
        url: api,
        data: data,
        success : function( msg ) {
            freeze(obj, false);
            if( $.isFunction(suc) ) { suc(msg)}
        },
        error:  function(msg){
            freeze(obj, false);
            if( $.isFunction(error) ) { error(msg)}
        }
    })

}

function freeze(obj, freeze) {

    if(freeze) {
        $(obj).addClass('freeze');
    } else {
        $(obj).removeClass('freeze');
    }
}





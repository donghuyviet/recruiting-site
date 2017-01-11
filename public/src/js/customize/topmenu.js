$( ".draggable" ).draggable({helper:'clone', revert: "invalid"});

$( ".droppable" ).droppable({
    drop: function(e, ui) {
        // $(this).append($(ui.draggable).clone());
        var moduleName = ui.draggable.attr('module-name');
        var position = $(this).attr('data-position');
        if(moduleName !== undefined) {
            loadModule(moduleName, position);
        }
    },
    activeClass: "drop-active",
});


$( ".sortable" ).sortable({
    placeholder: "ui-state-highlight"
});
$( ".sortable" ).disableSelection();

function loadModule(moduleName, position){

    var values = $("#myForm").serializeArray();
    values.push({
        name: "moduleName",
        value: moduleName
    }, {
        name: "position",
        value: position
    });
    values = jQuery.param(values);

    _fetch.post('top/moduleAction', values, function(res) {
        location.reload();
    })
}
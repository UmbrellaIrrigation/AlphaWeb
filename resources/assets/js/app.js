import Form from './utils/Form';

window.Form = Form;

var createModal = $('#createModal').modal('hide');
var createGroupModal = $('#createGroupModal').modal('hide');

$(function () {
    
    function onExit($input, save) {
        $input.keypress(function(e) {
            if(e.which == 13) {
                $(this).blur();
            }
        });
        $input.on('blur', save).focus();
    }

    $('body').on('click', '[data-editable]', function() {
        var $elem = $(this);
        var dtag = $elem.prop('tagName');
        var dtype = $elem.attr('data-type');
        var dname = $elem.attr('data-name');

        var $input = $('<input/>', {class: 'form-control', type: dtype, name: dname, required: 'true'}).val( $elem.text() );
        $elem.replaceWith( $input );
        
        var save = function() {
            if ( $input.val().length > 0 ) {
                var $text = $('<' + dtag + ' data-editable />').attr('data-type', dtype).attr('data-name', dname).text( $input.val() );
                $input.replaceWith( $text );
            }
        };
        
        if ( $input.val().length ) {
            onExit($input, save);
        } 
    });
});
$(document).ready(function () {
    $( function() {
        $( "#accordion" ).accordion({
            collapsible: true
        });
    } );
    $('#add_line').click(function () {
        if ($('tr.line').length < $('tr.line:first .ingredients option').length) {
            $line = $('tr.line:first').prop('outerHTML');
            $('tr.line:last').after($line);
            $('tr.line:last td:first').html('<a class="remove_line btn btn-outline-danger">-</a>');
        }
    });
}).on('click', function () {
    $('.remove_line').click(function () {
        if ($('tr.line').length > 1) {
            $(this).parent().parent().remove();
        }
    });
});



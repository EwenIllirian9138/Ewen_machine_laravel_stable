$(document).ready(function () {
    let line = $('.line:first').prop('outerHTML');
    let options = $('.line:first option').length;
    $('.line:first .remove_line').remove();
    $('.line:first td').children().prop('disabled', true);
    $('.line:first td:not(:first)').empty();

    $('#add_line').click(function () {
        if ($('tr.line').length-1 < options) {
            $('#new_ingredients').prepend(line);
            $('.line:first #add_line').remove();
        }
    });

    $('td').width(function () {
        return ((100 / ($(this).parent().children().length)) + '%');
    });

}).on('click', function () {
    $('.remove_line').click(function () {
        $(this).parent().parent().remove();
    });
});
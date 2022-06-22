$(document).ready(function () {

    $('.increase').click(function () {
        $(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) + 1);
    });
    $('.reduced').click(function () {
        if($(this).parent().find('input').val() > 1) {
            $(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) -1);
        }

    });
    $('#clear-cart-btn').click(function () {
       $('#clear-cart-form').submit();
    });
});

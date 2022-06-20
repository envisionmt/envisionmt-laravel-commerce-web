$(document).ready(function () {
    $('.add-cart').click(function (event) {
        event.preventDefault();
        $(this).find('form').submit();
    });
});

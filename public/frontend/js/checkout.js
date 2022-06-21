$(document).ready(function () {
    $('#checkout-btn').click(function (event) {
        if($('#term-condition-check').is(':checked')) {
            $('#checkout-form').submit();
        } else {
            $('#term-condition-message').show();
        }

    });
});

$(document).ready(function () {
    $('.select2').select2();

    $('.image-manager').filemanager('image');
});

function getClass(classNames)
{
    var index;
    for (var i = 0; i < classNames.length; i++) {
        if (isNumeric(classNames[i])) {
            index = classNames[i];
        }
    }

    return index;
}

function isNumeric(num){
    return !isNaN(num)
}

function deleteItem(id) {
    var result = confirm('Do you really want to delete these records? This process cannot be undone!');
    if (result) {
        $('#form-delete-' + id).submit();
    }
}

$(document).on('click', '.btn-delete-image', function () {
    if ($('.input-group-image').length >= 2) {
        $(this).closest('.input-group-image').remove();
    } else {

        $('.input-group-image input').val('');
    }
});

$(document).on('click', '.btn-add-image', function () {
    var newItem = $('.input-group-image').last().clone();
    var classNames = $(newItem).attr('class').split(/\s+/);
    var oldIndex = getClass(classNames);
    var newIndex = (+oldIndex + 1);

    newItem = replaceIndex(newItem, oldIndex, newIndex);

    $('.list-images').append(newItem);
    $('.image-manager').filemanager('image');
})

function replaceIndex(element, oldIndex, newIndex) {
    $(element).removeClass(oldIndex).addClass(newIndex.toString());

    $(element).find('button.image-manager')
        .attr('data-input', 'images-' + newIndex)
        .attr('data-preview', 'preview-image-' + newIndex);

    $(element).find('#images-' + oldIndex)
        .attr('id', 'images-' + newIndex)
        .attr('name', 'galleries[]')
        .val('');

    $(element).find('#preview-image-' + oldIndex)
        .attr('id', 'preview-image-' + newIndex);

    $(element).find('img')
        .remove();

    return element;
}

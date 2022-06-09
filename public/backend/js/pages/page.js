function initCkeditor() {
    var route_prefix = "/filemanager";
    var config = {
        height: 400,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images'
    };

    if (typeof(CKEDITOR) !== "undefined") {
        CKEDITOR.replace('body-english', config);
        CKEDITOR.replace('body-chinese', config);
    }
}

$(function () {
    initCkeditor();
});


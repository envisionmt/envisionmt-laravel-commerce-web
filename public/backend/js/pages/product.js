function initCkeditor() {
    var route_prefix = "/filemanager";
    var config = {
        height: 400,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images'
    };

    if (typeof(CKEDITOR) !== "undefined") {
        CKEDITOR.replace('content-english', config);
        CKEDITOR.replace('content-chinese', config);
    }
}

$(function () {
    initCkeditor();
});


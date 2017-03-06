$(document).on("click", '.btn-delete', function(e) {
    e.preventDefault();
    targetUrl = $(this).attr("href");
    bootbox.confirm("Are you sure?", function (confirmed) {
        if (confirmed) {
            window.location.href = targetUrl;
        }
    });
});
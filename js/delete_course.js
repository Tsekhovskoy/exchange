/**
 * Removing the selected force course record from the database and from the opened page without reloading by record's id.
 * Block calls from /views/set_course.php
 */

$( document ).ready(function() {
    $(document).on('click','.actbox', function () {
            var id = $(this).find('.bcross').attr('data-id');
            dellById(id, '/exchange/controllers/deletecourse.php');
        }
    );
});

function dellById(parameter, url) {
    $.ajax({
        url         : url,
        type        : "POST",
        data        : {"id":parameter},
        dataType    : "json",
        success: function() {
            $("#" + parameter).remove();
            swal("Deleted!", "Address deleted.", "success");
        },
        error: function() {
            swal("Not Deleted!", "Something is wrong.", "error");
        }
    });
}
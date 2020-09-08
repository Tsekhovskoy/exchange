/**
 * Removing the selected force course from the database and from the view without reloading the page
 */

$( document ).ready(function() {
    $(document).on('click','.actbox', function (e) {
            e.preventDefault();
            var id = $(this).find('.bcross').attr('data-id');
            dellById(id, './../controllers/deletecourse.php');
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
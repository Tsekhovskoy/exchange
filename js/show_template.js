/**
 * Adding a new force course and rendering actual force courses without reloading the page
 */

$( document ).ready(function() {
    getAjaxData( './../controllers/setcourse.php');
});

function getAjaxData(url) {
    $.ajax({
        url         :url,
        dataType    : "json",
        success: function(response) {
            for (var i = 0; i < response.length; i++) {
                $('#force_table').append('<tr class="item" id="'+ response[i].id + '">' +
                    '<td>' + response[i].startdate + '</td>>' +
                    '<td>' + response[i].stopdate + '</td>' +
                    '<td>' + response[i].course + '</td>' +
                    '<td class="actbox" > ' +
                    '<a class="bcross" data-id="' + response[i].id + '">' +
                    '</a></td></tr>');
            }
        },
        error: function(response) {
            swal("Server's problem!", "Tell to your system administrator!", "error");
        }
    });
}
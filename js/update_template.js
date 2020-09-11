/**
 * Automaticly renewing of current course without opened page reloading.
 * Block calls from /view/template.php
 */

$(document).ready(function() {
    executeQuery();
});

function executeQuery() {
    $.ajax({
        url         : './controllers/showcourse.php',
        dataType    : 'json',
        success: function(data) {
            if (data.course > 0) {
                $('#course').text('1 USD: ' + data.course + 'UAH');
            }
            else {
                $('#course').text('Error! Sorry, we are resolving this problem right now!');
            }
        },
        error: function() {
            swal("Server's problem!", "We are working on this problem now!", "error");
        }
    });
    setTimeout(executeQuery, 10000);
}


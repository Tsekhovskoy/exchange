/**
 * Automaticly renewing of current course without opened page reloading.
 * Block calls from /view/template.php
 */

$(document).ready(function() {
    executeQuery();
});

function executeQuery() {
    $.ajax({
        url         : '/template/update',
        dataType    : 'json',
        type: "POST",
        success: function(data) {
            console.log(data.course);
            if (data.course > 0) {
                $('#course').text('1 USD: ' + data.course + ' UAH');
            }
            else {
                $('#course').text('Error! Sorry, we are resolving this problem right now!');
            }
        },
        error: function(res) {
            console.log(res);
            swal("NBU server's problem!", "We are working on this problem now!", "error");
        }
    });
    setTimeout(executeQuery, 6000);
}


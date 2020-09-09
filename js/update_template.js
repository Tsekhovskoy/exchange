/**
 * Automaticly renewing of current course without opened page reloading.
 * Block calls from /view/template.php
 */

function executeQuery() {
    $.ajax({
        url         : './controllers/showcourse.php',
        dataType    : 'json',
        success: function(data) {
            if (data.course > 0) {
                $('#course').text('1 USD: ' + data.course + 'UAH');
            }
            else {
                $('#course').text('Error');
            }
        }
    });
    setTimeout(executeQuery, 50000);
}
    $(document).ready(function() {
    executeQuery();
    setTimeout(executeQuery, 50000);
});

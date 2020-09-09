function executeQuery() {
    $.ajax({
        url         : 'controllers/gettemplate.php',
        dataType    : 'json',
        success: function(data) {
            console.log(data.course);
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

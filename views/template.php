<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>Current course</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <script>
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
            setTimeout(executeQuery, 5000);
        }

        $(document).ready(function() {
            setTimeout(executeQuery, 5000);
        });
    </script>

</head>

<body>
    <h2>The current course for today</h2>
    <div>
        <p id="course">Course will be updated soon</p>
    </div>


</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>Current course</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/course.js"></script>

    <script>
        function executeQuery() {
            $.ajax({
                url         : 'controllers/gettemplate.php',
                dataType    : 'json',
                success: function(data) {
                    $('#course').textContent('1 UAH: ' + data[0]);
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
        <p id="course"></p>
<!--        <span id="course"></span>-->
    </div>


</body>
</html>
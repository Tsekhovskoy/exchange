<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The better exchange for you</title>
    <link href="./../css/default.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="./../js/show_template.js"></script>
    <script type="text/javascript" src="./../js/add_course.js"></script>
    <script type="text/javascript" src="./../js/delete_course.js"></script>
</head>

<body>
<!--<form action="/exchange/models/Set_course.php" id="set_course" method="POST">-->
<form id="set_course" method="">
    <div>
        <label>Force course end day</label>
        <input type="datetime-local" name="datetime" id="datetime">
        <label>Force course value</label>
        <input type="number" name="forcecourse" id="forcecourse" step="0.01" min="0" placeholder="0,00"> UAH
        <button type="submit" class="force_btn" id="force_btn">Submit</button>
    </div>
</form>
<table class="force_table" id="force_table">
    <tr> <th>Force course created at</th> <th>Force course valid until</th> <th>Force course value</th> <th>Action</th> </tr>
</table>
<div class="course_list" id="course_list"></div>

</body>
</html>
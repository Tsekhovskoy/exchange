<!--The force course customisation page. A force course form and force course list templating -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The better exchange for you</title>
    <link href="/css/default.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/js/show_template.js"></script>
    <script type="text/javascript" src="/js/add_course.js"></script>
    <script type="text/javascript" src="/js/delete_course.js"></script>
</head>

<body>
    <h2 align="center">Enter a new force course please</h2>
    <div class="force_form" align="center">
        <form id="set_course" method="">
                <label>Force course date valid (mm/dd/yyyy)</label>
                <input type="date" name="date" id="date" required>
                <label>Force course time valid (hh:mm AM/PM)</label>
                <input type="time" name="time" id="time" required>
                <label>Force course value</label>
                <input type="number" name="forcecourse" id="forcecourse" step="0.01" min="0" placeholder="0,00" required> UAH
                <button type="submit" class="force_btn" id="force_btn">Submit</button>

        </form>
    </div>
    <h2 align="center">History of force course changing</h2>

    <div class="force_history" align="center">
        <table class="force_table" id="force_table">
            <tr> <th>Force course created at</th> <th>Force course valid until</th> <th>Force course value</th> <th>Action</th> </tr>
        </table>
    </div>
</body>
</html>
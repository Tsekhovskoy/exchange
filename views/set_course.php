<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>

<body>
<form action="/exchange/models/Set_course.php" id="set_course" method="POST">
    <div>
        <input type="datetime-local" name="datetime">
    </div>
    <div>
        <input type="number" name="forcecourse" step="0.01" min="0" placeholder="0,00"> UAH
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
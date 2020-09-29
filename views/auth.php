<!--The admin authorisation form-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link href="/css/default.css" rel="stylesheet"/>

</head>
<body>
<div align="center">
    <h2>Please enter your login name and password</h2>
        <form action="/login/login" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit">Login</button>
            </div>
        </form>
</div>
</body>
</html>

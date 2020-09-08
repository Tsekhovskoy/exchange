<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/exchange/css/default.css" rel="stylesheet"/>

</head>
<body>
    <h2>Login Form</h2>
        <form action="/exchange/controllers/adminlogin.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
            </div>
        </form>
</body>
</html>

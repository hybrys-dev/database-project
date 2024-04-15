<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="check_login.php" method="post">
        <label for="username">username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" namevalue="Login" >
    </form>
</body>
</html>
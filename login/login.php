<?php
 //finire codice login blackbox e sistemarlo per le esigenze
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(strlen($username) < 3 || strlen($password) < 6)
            {
                echo "<p>L'username deve essere lungo almeno 3 caratteri e la password almeno 6 caratteri"
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<?php
    session_start();

    $valid_username = "admin";
    $valid_password = "admin";

    if($POST["username"] === $valid_username && $POST["password"] === $valid_password)
    {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;
        $conn = mysqli_connect("localhost", "root", "", "db_name");
        header("Location: main.php");
        exit();
    }
    else
    {
        header("Location:index.php?error=1");
        exit();
    }
?>
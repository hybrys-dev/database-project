<?php
    session_start();

    $valid_username = "root";
    $valid_password = "toor";

    if($POST["username"] === $valid_username && $POST["toor"] === $valid_password)
    {
        $_SESSION["logged_in"] = true;
        header("Location: main.php");
        exit;
    }
    else
    {
        header("Location:index.php?error=1");
        exit;
    }
?>
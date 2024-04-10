<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true)
    {
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <ul>
        <li><a href="connection_server.php">Connessione al Server</a></li>
        <li><a href="connection_database.php">Connessione al Database</a></li>
        <li><a href="manipulation_table.php">Manipolazione Tabella</a></li>
        <li><a href="manipulation_record.php">Manipolazione Record</a></li>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
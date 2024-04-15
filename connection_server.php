<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true)
    {
        header("Location: main.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conessione al Server</title>
</head>
<body>
    <h2>Connessione al Server</h2>
    <!--aggiunge varie funzioni-->
</body>
</html>
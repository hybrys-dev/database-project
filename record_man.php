<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento dati nelle tabelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include 'DB_Connection.php';
        $username = start_error_userprint();
        $currentdb = dbprint();
    ?>

    <h1>Inserimento dati nelle tabelle</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
</body>
</html>
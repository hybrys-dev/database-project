<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'DB_Connection.php';
        $username = start_error_userprint();
    ?>
    <h1>Benvenuto nel tuo DBMS</h1> <h3>User: <?php echo $username; ?></h3> <h3>Database:</h3> 
    
    <div class="homepage-container">
        <div class="homepage-links">
            <a href="man_db.php">Connessione ai tuoi database</a>
            <a href="man_table.php">Lavora sulle tabelle</a>
            <a href="record_man.php">Manipola record della tabella</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>

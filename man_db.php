<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selezione database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        // Include the database connection file
        include 'DB_Connection.php';
        $username = start_error_userprint();
    ?>

    <h1>Seleziona un database</h1> <h3>User: <?php echo $username; ?></h3> <h3>Database:</h3>
    
    <?php
        $mysqli = new mysqli("localhost", "root", "");
        
        if($mysqli->connect_error)
        {
            die("Conessione fallita: " . $mysqli->connect_error);
        }

        $query = "SHOW DATABASES";
        $result = $mysqli->query($query);

        echo "<h2>Database disponibili:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc())
        {
            $databaseName = $row['Database'];
            echo "<li>$databaseName</li>";
        }
        echo "</ul>";
    ?>

    <h2>Database disponibili:</h2>
            

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione tabelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include 'DB_Connection.php';
        $username = start_error_userprint();
        if(isset($_GET['database'])) {
            $database = $_GET['database'];
            echo "<h3>Database: $database</h3>";
    
            // Establish a connection to the selected database
            $pdo = new PDO("mysql:host=your_host;dbname=$database", 'your_username', 'your_password');
            
            // Query to get all tables
            $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    
            // Display tables
            echo "<ul>";
            foreach ($tables as $table) {
                echo "<li>$table</li>";
            }
            echo "</ul>";
        } else {
            // Redirect or display an error message if no database is provided
            header("Location: error.php");
            exit();
        }
    ?>

    <h1>Crea o gestisci una tabella</h1> <h3>User: <?php echo $username; ?></h3> <h3>Database:</h3>
</body>
</html>
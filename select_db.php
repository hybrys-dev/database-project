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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    
        include 'functions.php';
        $username = start_error_userprint();
        $currentdb = dbprint();
    ?>

    <h1>Selezione databasee</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
    <a href="main.php">Homepage</a>

    
    <?php
        $mysqli = new mysqli("localhost", "root", "");
        
        if($mysqli->connect_error)
        {
            die("Conessione fallita: " . $mysqli->connect_error);
        }

        $query = "SHOW DATABASES";
        $result = $mysqli->query($query);
        
    ?>
    <div class="form-container">
        <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
            <label for="dbname">Select Database:</label>
            <select name="dbname" id="dbname">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='". $row['Database']. "'>". $row['Database']. "</option>";
                        }
                    } else {
                        echo "<option value=''>No databases found</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Seleziona">
        </form>
    </div>
</body>
</html>
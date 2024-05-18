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
        $currentdb = dbprint();
    ?>

    <h1>Selezione databasee</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
    
    <?php
        include 'select_funct.php';
        $mysqli = new mysqli("localhost", "root", "");
        
        if($mysqli->connect_error)
        {
            die("Conessione fallita: " . $mysqli->connect_error);
        }

        $query = "SHOW DATABASES";
        $result = $mysqli->query($query);
        
        //echo "<h2>Database disponibili:</h2>";
        //while ($row = $result->fetch_assoc())
        //{
        //    $databaseName = $row['Database'];
        //    $i = count($row);
        //    echo "<h2 onclick>$databaseName</h2>";
        //}
        
    ?>

    <form action="select_funct.php" method="post" class="center-form">
        <select name="dbname">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Database'] . "'>" . $row['Database'] . "</option>";
                    }
                } else {
                    echo "<option>No databases found</option>";
                }
            ?>
        </select>
        <input type="submit" value="Select Database">
    </form>
    <?php
        if (isset($_SESSION['dbname'])) {
            $dbname = $_SESSION['dbname'];
            $conn->select_db($dbname);
        }
        if ($conn->error) {
            die("Failed to select database: " . $conn->error);
        }
    ?>

</body>
</html>
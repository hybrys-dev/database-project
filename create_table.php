<?php
    //seganlatori errori
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'functions.php'; //inclusione funzioni
    $username = start_error_userprint(); //session_start() + recupero utente
    $currentdb = dbprint(); //recupero database in uso

    $executionResult = null; //variabile 
    $connection = connectionAL();//connessione

    //recupero tabelle del database selezionato    
    if ($_POST) {
        $_SESSION["table"] = $_POST["table"];
        $sql = "SELECT * FROM " . $_SESSION['table'];
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            $header = true;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($header) {
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    echo "</tr>";
                    $header = false;
                }
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 risultati";
        }
    }
    
    $sql = 'SHOW TABLES from ' . $_SESSION['dbname']; //query recupero tabelle
    $result = mysqli_query($connection, $sql); //esecuzione query
    //stampa tabelle presenti 
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Existing Tables:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='?table=" . $row["Tables_in_" . $_SESSION['dbname']] . "'>" . $row["Tables_in_" . $_SESSION['dbname']] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No tables found in the database.";
    }
    
    CloseConnection($connection); //chiusura connessione


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creazione tabelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Creazione tabelle</h1>
    <h3>User: <?php echo $username; ?></h3> <!-- stampa utente -->
    <h3>Database:<?php echo $currentdb?></h3> <!-- stampa database in uso -->

        <h2>Creazione tabelle</h2>
            <form action=<?php echo $_SERVER["PHP_SELF"] ?>  method="POST">
                <select name="table" id="">
                    <?php
                        if (mysqli_num_rows($result) > 0) { 
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach ($row as $key => $value) {
                                    echo "<option value=".$row[$key].">".$row[$key]."</option>";
                                }
                            }
                        }    
                    ?>
                </select>
        <input type="submit">
    </form>
</body>
</html>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'functions.php';
    $username = start_error_userprint();
    $currentdb = dbprint();

    $executionResult = null;
    $connection = connectionAL();
    if($_POST){
        $_SESSION["table"] = $_POST["table"];
        $sql = "SELECT * FROM ".$_SESSION['table'];
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Output delle righe
            echo "<table>";
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>";
                            echo $key;
                        echo "</td>";
                    }
            echo "</tr>";
            mysqli_data_seek($result,0);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>";
                            echo $value;
                        echo "</td>";
                    }
                echo "</tr>";
            }
            echo "</table>";
            } else {
            echo "0 risultati";
            }
    }
    $sql = 'SHOW TABLES from'. $_SESSION['dbname'];
    //$result = mysqli_query($connection, $sql);
    CloseConnection($connection);

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
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>

    <div class="container">
        <h2>Creazione tabelle</h2>
        <form method="post">
            <textarea name="sql" placeholder="Inserisci il codice SQL qua..."></textarea><br>
            <input type="submit" value="Execute">
        </form>
        <?php if ($executionResult !== null): ?>
            <div class="result"><?php echo htmlspecialchars($executionResult); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
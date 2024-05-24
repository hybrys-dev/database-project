<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'functions.php';
    $username = start_error_userprint();
    $currentdb = dbprint();
    include 'db_config.php';

    $executionResult = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = $_POST['sql'];

        if ($connection->multi_query($sql)) {
            $executionResult = "Tabella creata con successo";
        } else {
            $executionResult = "Errore nella creazione della tabella:" . $connection->error;
        }
        // Chiudi la connessione per completare tutte le query multiple
        while ($connection->more_results() && $connection->next_result()) {;}
        $connection->close();
    }
    $sql = 'SHOW TABLES';
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['Tables_in_' . $database] . '<br>';
        }
    } else {
        echo 'Nessuna tabella trovata nel database.';
    }

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
<?php
    include 'DB_Connection.php';
    $username = start_error_userprint();
    $currentdb = dbprint();
    include 'db_config.php';

    $executionResult = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = $_POST['sql'];

        if ($conn->multi_query($sql)) {
            $executionResult = "Tables created successfully!";
        } else {
            $executionResult = "Error creating tables: " . $conn->error;
        }
        // Chiudi la connessione per completare tutte le query multiple
        while ($conn->more_results() && $conn->next_result()) {;}
        $conn->close();
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
        <h2>Create Tables</h2>
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
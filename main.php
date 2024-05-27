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
            //segnalatori errori
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include 'functions.php'; //inclusione funzioni

            $username = start_error_userprint();//session_start() + recupero utente 
            $currentdb = dbprint(); //recupero database in uso

            $connection = connectionAL(); //connessione
            CloseConnection($connection);//chiusura connessione
        ?>
        <h1>Benvenuto nel tuo DBMS</h1>
        <h3>User: <?php echo $username; ?></h3> <!-- stampa utente -->
        <h3>Database:<?php echo $currentdb?></h3><!-- stampa database in uso-->
        <h3>Table:<?php $tmp  = isset($_SESSION['table']) ? 1 : 0; ?>
        <?php if($tmp) echo $_SESSION['table'] ?></h3>
        
        <!-- opzioni -->
        <div class="homepage-container">
            <div class="homepage-links">
                <a href="select_index.php">Update</a>
                <a href="select_db.php">Selezione database</a>
                <a href="create_table.php">Creazione tabelle</a>
                <a href="selectTable.php">Selezione tabella</a>
                <a href="insert.php">Insert</a>
                <a href=""></a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>

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
            //segnalatori errori
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            include 'functions.php'; //inclusione funzioni
            $username = start_error_userprint(); //session_start() + recupero utente
            $currentdb = dbprint(); //recupero database in uso
        ?>
        
        <h1>Selezione database</h1>
        <h3>User: <?php echo $username; ?></h3> <!-- stampa utente -->
        <h3>Database:<?php echo $currentdb?></h3> <!-- stampa database in uso-->
        
        <?php
            $connection = connection(); //connessione
            $sql = "SHOW DATABASES"; //query di recupero dei database
            $result = mysqli_query($connection,$sql); //esecuzione query
            
            //salvataggio nome database + reinderizzamento
            if($_POST){
                $_SESSION['dbname'] = $_POST['dbname'];
                header('Location: main.php');
            }
        ?>
        
        <!-- form -->
        <div class="form-container">
            <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
                <label for="db">Select Database:</label>
                <select name="dbname" id="">
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='". $row['Database']. "'>". $row['Database']. "</option>";
                            }
                        }
                        else{
                            echo "<option value=''>No databases found</option>";
                        }
                        CloseConnection($connection); //chiusura connessione
                    ?>
                </select>
                <input type="submit" value="Seleziona">
                </script>
            </form>
        </div>
    </body>
</html>

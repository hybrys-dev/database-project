<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiornamento dati nelle tabelle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
        include 'functions.php';
        $username = start_error_userprint();
        $currentdb = dbprint();
    ?>

    <h1>Aggiornamento dati nelle tabelle</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
    
    <?php

        if($_POST){
            $_SESSION['index'] = $_POST['index'];
            header('Location: update_table.php');
        }
        
        $conn = connectionAL();
        $sql = "SELECT * FROM ".$_SESSION['table'];
        $result = mysqli_query($conn,$sql);
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
    ?>
    
    <form action="select_index.php" method="POST">
        <input type="number" name="indice" id="">
        <input type="submit" name="indice">
    </form>

</body>
</html>
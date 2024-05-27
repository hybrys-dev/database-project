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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include 'functions.php';
        $username = start_error_userprint();
        $currentdb = dbprint();
        $connection = connectionAL();
        
        if($_POST){
            $_SESSION['table'] = $_POST['table'];
            header("Location: main.php");
        }

        $sql = " SHOW TABLES FROM ".$_SESSION['dbname'];
        $result = mysqli_query($connection, $sql);
        /* if (mysqli_num_rows($result) > 0) {
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
            } */

        
        
    ?>
    <h1>Benvenuto nel tuo DBMS</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
    
    <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
        <select name="table" id="">
            <?php 
            while($row = mysqli_fetch_assoc($result)){
                foreach ($row as $key => $value) { ?>
                <option value=<?php echo $value ?>> <?php echo $value?></option>
            <?php }} ?>
        </select>
        <input type="submit" >
    </form>
    
</body>
</html>
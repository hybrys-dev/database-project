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
        $conn = connectionAL();

        $sql = "SELECT * FROM ".$_SESSION["table"]." LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result); 
        if($_POST){
            $sql = "INSERT INTO ".$_SESSION['table']." VALUES(";
            foreach ($rows as $key => $value) {
                $sql .= "'".$_POST[$key]."',";
            }
            $sql = rtrim($sql,",");
            $sql .= ");";
            mysqli_query($conn, $sql);
        }

        $sql = "SELECT * FROM ".$_SESSION['table'];
        $result = mysqli_query($conn, $sql);
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

        
        

        
        CloseConnection($conn);
    ?>


</body>
</html>
 <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
        <?php foreach ($rows as $key => $value) { ?>
            <label><?php echo $key?></label>
            <input type="text" name=<?php echo $key?> id="">
        <?php } ?>
        <input type="submit">
    </form>
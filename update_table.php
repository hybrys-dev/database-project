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
        $sql = "SELECT * FROM ".$_SESSION['table'];
        $result = mysqli_query($conn,$sql);
        if(isset($_POST['submit'])){
            $index = $_SESSION['index'];
            echo $index;
            if (mysqli_num_rows($result) > 0) {
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)){
                    
                    if($counter == $index){
                        $sql = 'UPDATE '.$_SESSION['table']." SET ";
                        foreach ($row as $key => $value) {
                            $sql .= $key."='".$_POST[$key]."',";
                        }
                        $sql = rtrim($sql,",");
                        $sql .= " WHERE ";
                        foreach ($row as $key => $value) {
                            $sql .= $key."='".$value."' AND ";
                        }
                        $sql = rtrim($sql," AND ");
                        $sql .= ';';
                    }
                    $counter += 1;
                }
                echo $sql;
                mysqli_query($conn,$sql);
                //header('Location: select_index.php');
            }
        }
        $row = mysqli_fetch_assoc($result);

    ?>
    <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
        
            <?php 
                foreach ($row as $key => $value) { ?>
                <label for=""><?php echo $key;?> </label>
                <input type="text" name=<?php echo $key;?> id="">
            <?php } ?>
        
        <input type="submit" name="submit" value="submit">
    </form>

</body>
</html>
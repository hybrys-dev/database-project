<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selezione database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Selezione database</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3> 
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        include 'functions.php';
        $username = start_error_userprint();
        $currentdb = dbprint();

        $connection = connectionAL();
        $sql = "SHOW DATABASES";
        $result = mysqli_query($connection,$sql);
        
        if($_POST){
            $_SESSION['dbname'] = $_POST['dbname'];
            header('Location: create_table.php');
        }
    ?>
    
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
                    CloseConnection($connection);
                ?>
            </select>
            <input type="submit" value="Seleziona">
            </script>
        </form>
    </div>
</body>
</html>

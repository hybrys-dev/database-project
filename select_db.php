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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    
        include 'functions.php';
        $username = start_error_userprint();
        $currentdb = dbprint();
        $connection = connectionAL();
    ?>

    <h1>Selezione database</h1>
    <h3>User: <?php echo $username; ?></h3>
    <h3>Database:<?php echo $currentdb?></h3>
    
    <?php
        if($_POST){
            $_SESSION['dbname'] = $_POST['dbname'];
            header('Location: create_table.php');
        }
        $connection = connectionAL();
        $sql = "SHOW DATABASES";
        $result = mysqli_query($connection,$sql);
        CloseConnection($connection);
        
    ?>
    <div class="form-container">
        <form action=<?php echo $_SERVER["PHP_SELF"]?> method="POST">
            <label for="dbname">Select Database:</label>
            <select name="dbname" id="dbname">
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row['Database']. "'>". $row['Database']. "</option>";
                        }
                    } else {
                        echo "<option value=''>No databases found</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Seleziona" onclick="redirect()" >
            <script>
                function redirect(){
                    window.location.href = 'create_table.php';
                }
            </script>
        </form>
    </div>
</body>
</html>

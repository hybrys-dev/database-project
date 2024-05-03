<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include 'DB_Connection.php';
        $username = start_error_userprint();
    ?>

    <h1>Interroga database tramite query SQL</h1> <h3>User: <?php echo $username; ?></h3> <h3>Database: </h3> 

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selezione database</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Exo&display=swap');

        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            font-size: 20px;
            font-family: "Exo", sans-serif;
            color: #fff;
            background: linear-gradient(-90deg, #000, #293133);
            background-size: 500% 500%;
            animation: gradientBG 20s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        h1
        {
            font-size: 30px;
            font-weight: bold;
            color: white;
            text-align: center;
            justify-content: center;
        }
        h3
        {
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>

    <?php
        include 'DB_Connection.php';
        $username = start_error_userprint();
    ?>

    <h1>Seleziona un database</h1> <h3>User: <?php echo $username; ?></h3> <h3>Database:</h3> 
</body>
</html>
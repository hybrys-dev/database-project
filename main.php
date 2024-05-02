<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
        .homepage-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .homepage-links {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            align-items:center
        }

        .homepage-links a {
            color: white;
            text-decoration: none;
            font-size: 24px;
            margin-bottom: 10px;
            align-items: center;
        }
        
        .homepage-logout{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content:flex-end;
            align-items: center;
            flex-direction: column;
        }

        .homepage-links a:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <?php
        $username = $_POST['username'];
    ?>
    <h1>Benvenuto nel tuo DBMS<php? echo $username ?></h1>
    <div class="homepage-container">
        <div class="homepage-links">
            <a href="man_db.php">Connessione ai tuoi database</a>
            <a href="man_table.php">Lavora sulle tabelle</a>
            <a href="record_man.php">Manipola record della tabella</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>

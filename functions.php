<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    function Connection()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "database_users";

        $connection = new mysqli($host, $user, $password, $dbname);
        if(!$connection)
        {
            die("Connessione fallita". mysqli_connect_error());
        }
        return $connection;
    }

    function CloseConnection($connection)
    {
        mysqli_close($connection);
    }

    function start_error_userprint()
    {
        session_start();
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    
        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
            return $username;
        }
        else
        {
            header("Location: login.php");
            exit();
        }
        
    }
    function dbprint()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dbname = $_POST["dbname"];
            return $dbname;
        }
        else
        {
            $dbname = "Nessun database selezionato";
            return $dbname;
        }
    }
?>
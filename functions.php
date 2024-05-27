<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $host = "localhost";
    $user = "root";
    $password = "";
    function Connection()
    {
        global $host, $user, $password;
        $dbname = "database_users";

        $connection = new mysqli($host, $user, $password, $dbname);
        if(!$connection)
        {
            die("Connessione fallita". mysqli_connect_error());
        }
        return $connection;
    }
    function connectionAL() //After Login
    {
            global $host, $user, $password;
            $connection = mysqli_connect($host, $user, $password, $_SESSION['dbname']);
            if (!$connection) {
                die("Connessione al database fallita: " . mysqli_connect_error());
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
        if(isset($_SESSION['dbname'])){
            $dbname = $_SESSION["dbname"];
        }
        else
        {
            $dbname = "Nessun database selezionato";
        }
        $currentdb = $dbname;
        return $currentdb;

    }
?>
<?php
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
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
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
    function selectdb()
    {
        
    }
?>
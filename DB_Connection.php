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
?>
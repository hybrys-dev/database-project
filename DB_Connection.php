<?php
    function Connection()
    {
        $host = $_SESSION['localhost'];
        $user = $_SESSION['root'];
        $password = $_SESSION[''];;
        $dbname = $_SESSION['dbname'];;

        $connection = mysqli_connect($host, $user, $password, $dbname);
        if(!$connection)
        {
            die("Connessione fallita". mysqli_connect_error());
        }
        echo "Connessione avvenuta con successo!";
        return $connection;
    }

    function CloseConnection($connection)
    {
        mysqli_close($connection);
    }
    
?>
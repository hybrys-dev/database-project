<?php

$servername = "localhost";
$username = "root";
$password = "";

// Connessione al server
$conn = new mysqli($servername, $username, $password);

// Controlla connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Se è stato selezionato un database, usalo
if (isset($_SESSION['dbname'])) {
    $dbname = $_SESSION['dbname'];
    $conn->select_db($dbname);
    if ($conn->error) {
        die("Failed to select database: " . $conn->error);
    }
}
?>

<?php

if (isset($_POST['dbname'])) {
    $_SESSION['dbname'] = $_POST['dbname'];
    header('Location: main.php'); // Redirigi alla pagina principale o a una pagina di conferma
}
?>

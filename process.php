<?php
// Connessione al database
$mysqli = new mysqli("localhost", "utente", "password", "database");

if ($mysqli->connect_errno) {
    echo "Connessione al database fallita: " . $mysqli->connect_error;
    exit();
}

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se è stato selezionato un titolo
    if (isset($_POST["selected_title"])) {
        $selectedTitle = $_POST["selected_title"];
        function currentdbf(){
            $currentdb = $selectedTitle;
            return $currentdb;
        }
        // Esegui una query per recuperare i dati basati sul titolo selezionato
        $query = "SELECT * FROM tabella WHERE titolo = '$selectedTitle'";
        $result = $mysqli->query($query);
        
        if ($result->num_rows > 0) {
            // Stampa i risultati
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Titolo: " . $row["titolo"] . "<br>";
                // Aggiungi altri campi se necessario
            }
        } else {
            echo "Nessun risultato trovato per il titolo selezionato.";
        }
    } else {
        echo "Nessun titolo selezionato.";
    }
}

// Chiudi la connessione al database
$mysqli->close();
?>

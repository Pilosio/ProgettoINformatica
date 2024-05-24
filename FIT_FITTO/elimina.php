<?php
// Verifica se è stato passato un parametro 'numero' tramite GET
if (isset($_GET['numero'])) {
    // Recupera il numero della riga da eliminare
    $numero = $_GET['numero'];

    // Connessione al database
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "fittofit"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Escaping del numero per evitare SQL injection
    $numero = $conn->real_escape_string($numero);

    // Preparazione della query SQL per eliminare il record specifico basandosi sul numero di riga
    $sql = "DELETE FROM piani_coach WHERE id IN (SELECT id FROM (SELECT id, @rownum := @rownum + 1 AS numero_riga FROM piani_coach, (SELECT @rownum := 0) r) AS numbered_rows WHERE numero_riga = $numero)";

    // Esecuzione della query
    if ($conn->query($sql) === TRUE) {
        echo "Ci dispiace che hai cancellato il Coaching.Contattaci facendoci il motivo";
    } else {
        echo "Errore durante l'eliminazione del record: " . $conn->error;
    }

    // Chiusura della connessione
    $conn->close();
} else {
    echo "Errore: Numero di riga mancante.";
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .reviews-table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .reviews-table th,
        .reviews-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .reviews-table th {
            background-color: #f2f2f2;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
         #mac {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #mac:hover {
            background-color: black;
        }
    </style>
</head>

<body>
     <form action="ADMINRECENSIONI.php" method="post">
        <input type="submit" id="mac" name="ButtonExit" value="Indietro">
        <?php if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
        } ?>
    </form>

    <div class="container">
        <h1>RECENSIONI</h1>

        <?php
        // Connessione al database (modifica i valori per il tuo database)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fittofit";

        // Crea una connessione
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Controlla la connessione
        if ($conn->connect_error) {
            die("Connessione al database fallita: " . $conn->connect_error);
        }

        // Se è stata inviata una richiesta di eliminazione
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
            // Recupera l'ID della recensione da eliminare
            $delete_id = $_POST['delete_id'];
            // Query per eliminare la recensione
            $sql_delete = "DELETE FROM recensioni WHERE id = $delete_id";
            if ($conn->query($sql_delete) === TRUE) {
                echo "<p style='color: green;'>Recensione eliminata con successo!</p>";
            } else {
                echo "<p style='color: red;'>Errore durante l'eliminazione della recensione: " . $conn->error . "</p>";
            }
        }

        // Query per recuperare le recensioni
        $sql = "SELECT * FROM recensioni";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='reviews-table'>";
            echo "<tr><th>Nome</th><th>Email</th><th>Messaggio</th><th>Elimina</th></tr>";
            // Output dei dati di ogni recensione
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["messaggio"] . "</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='delete-button'>Elimina</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nessuna recensione trovata.";
        }

        // Chiudi la connessione al database
        $conn->close();
        ?>

    </div>

</body>

</html>

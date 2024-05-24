<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piani Disponibili</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: url('pontos.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 90%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tables {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 45%;
            margin: 20px 0;
            font-size: 18px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 16px;
            text-align: center;
        }

        th {
            background-color: #ff4d4d;
            color: white;
        }

        td {
            background-color: #ffcccc;
        }

        tr:hover {
            background-color: #ff9999;
        }

        #mac {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #mac:hover {
            background-color: #cc0000;
        }

        button[type="submit"] {
            background-color: #cc0000;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #990000;
        }

        .elimina-link {
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }

        .elimina-link:hover {
            text-decoration: none;
        }

        .message {
            margin-top: 20px;
            color: #cc0000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="DIETA.php" method="post">
        <input type="submit" id="mac" name="ButtonExit" value="Indietro">
        <?php if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaPostLogin.php");
        } ?>
    </form>
    <div class="container">
        <?php
        session_start();
        $id = $_SESSION['id'];
        $nome = $_SESSION['nome'];
        $cognome = $_SESSION['cognome'];
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fittofit";

        $conn = new mysqli($host, $username, $password, $dbname);

        // Verifica della connessione al database
        if ($conn->connect_error) {
            die("Connessione al database fallita: " . $conn->connect_error);
        }

        $message = '';

        // Funzione per eliminare un record
        function deleteRecord($conn, $id, $delete_numero, $table, $column) {
            global $message;
            $item_sql = "SELECT $column FROM $table WHERE fk_id = $id LIMIT 1 OFFSET $delete_numero";
            $item_result = $conn->query($item_sql);
            if ($item_result->num_rows > 0) {
                $item_row = $item_result->fetch_assoc();
                $item_value = $item_row[$column];
                $delete_sql = "DELETE FROM $table WHERE fk_id = $id AND $column = '$item_value' LIMIT 1";
                if ($conn->query($delete_sql) === TRUE) {
                    $message = "Ci dispiace che hai cancellato il $column. Contattaci facendoci sapere il motivo.";
                } else {
                    $message = "Errore durante l'eliminazione del record: " . $conn->error;
                }
            } else {
                $message = "Errore: Record non trovato.";
            }
        }

        // Eliminazione record dalla tabella piani_coach
        if (isset($_POST['delete_numero1'])) {
            deleteRecord($conn, $id, $_POST['delete_numero1'], 'piani_coach', 'coach');
        }

        // Eliminazione record dalla tabella piani_dieta
        if (isset($_POST['delete_numero2'])) {
            deleteRecord($conn, $id, $_POST['delete_numero2'], 'piani_dieta', 'dieta');
        }

        // Funzione per mostrare la tabella
        function displayTable($conn, $id, $table, $column, $numero_name) {
            $sql = "SELECT fk_id, $column FROM $table WHERE fk_id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID_Utente</th><th>" . ucfirst($column) . "</th><th>Numero</th><th>Elimina</th></tr>";
                $numero = 0;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fk_id"] . "</td>";
                    echo "<td>" . $row[$column] . "</td>";
                    echo "<td>" . $numero . "</td>";
                    echo "<td><form method='post'><button type='submit' name='$numero_name' value='" . $numero . "'>Elimina</button></form></td>";
                    echo "</tr>";
                    $numero++;
                }
                echo "</table>";
            } else {
                echo "<div>Nessun piano disponibile.</div>";
            }
        }

        echo "<div class='tables'>";
        echo "<div>";
        echo "<h2>Coaching</h2>";
        displayTable($conn, $id, 'piani_coach', 'coach', 'delete_numero1');
        echo "</div>";

        echo "<div>";
        echo "<h2>Dieta</h2>";
        displayTable($conn, $id, 'piani_dieta', 'dieta', 'delete_numero2');
        echo "</div>";
        echo "</div>";

        if ($message != '') {
            echo "<div class='message'>$message</div>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>


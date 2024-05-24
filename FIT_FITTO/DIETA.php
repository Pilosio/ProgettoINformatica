<!DOCTYPE html>
<html>
<head>
    <title>Dieta</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('dieta.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }

        h1 {
            font-size: 50px;
            font-weight: 600;
            color: red;
            text-transform: uppercase;
            text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2),
                         1px 2px 0px rgba(0, 0, 0, 0.2),
                         1px 3px 0px rgba(0, 0, 0, 0.2),
                         1px 4px 0px rgba(0, 0, 0, 0.2),
                         1px 5px 0px rgba(0, 0, 0, 0.2),
                         1px 6px 0px rgba(0, 0, 0, 0.2),
                         1px 10px 5px rgba(0, 0, 0, 0.1),
                         1px 15px 10px rgba(0, 0, 0, 0.1),
                         1px 20px 30px rgba(0, 0, 0, 0.1),
                         1px 25px 50px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .diet-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
        }

        .diet-plan {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 30%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .diet-plan h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .diet-plan p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .diet-plan input[type=submit] {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .diet-plan input[type=submit]:hover {
            background-color: black;
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

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 80%;
        }

        .popup h2 {
            font-size: 24px;
            color: red;
            margin-bottom: 10px;
        }

        .popup p {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }

        .popup button {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup button:hover {
            background-color: black;
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
    
    <h1>Dieta</h1>

    <div class="diet-container">
       
        <div class="diet-plan">
            <?php
            // IPERCALORICA
            session_start();
            $id = $_SESSION['id'];
            $nome = $_SESSION['nome'];
            $cognome = $_SESSION['cognome'];
            $servername = "localhost";
            $username = "root"; // Sostituisci con il tuo nome utente del database
            $password = ""; // Sostituisci con la tua password del database
            $dbname = "fittofit"; // Sostituisci con il nome del tuo database
            $conn = new mysqli($servername, $username, $password, $dbname);
            $titolo = "";
            $descrizione = "";

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            $sql = "SELECT titolo FROM dieta LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of first row
                while ($row = $result->fetch_assoc()) {
                    $titolo = $row["titolo"];
                    echo "<h2>$titolo</h2>";
                }
            } else {
                echo "0 risultati";
            }

            $sql_descrizione = "SELECT descrizione FROM dieta LIMIT 1";
            $result_descrizione = $conn->query($sql_descrizione);

            if ($result_descrizione->num_rows > 0) {
                // Output data of first row
                while ($row = $result_descrizione->fetch_assoc()) {
                    $descrizione = $row["descrizione"];
                    echo "<p>$descrizione</p>";
                }
            } else {
                echo "0 risultati";
            }

            $conn->close();
            ?>
            
            <form id="form-dieta1" method="post">
                <input type="submit" value="Spiegazione" onclick="openPopup('<?php echo $titolo ?>', '<?php echo $descrizione ?>', event);">
                <input type="submit" name="BottoneDieta1" value="Scegli">

                <?php
                if (isset($_POST['BottoneDieta1'])) {
                    $id = $_SESSION['id'];
                    $nome = $_SESSION['nome'];
                    $cognome = $_SESSION['cognome'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "fittofit";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    if (isset($_POST['BottoneDieta1'])) {
                        $sql = "INSERT INTO piani_dieta (fk_id,dieta) VALUES ('$id','Dieta Ipercalorica')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Grazie per aver scelto questa dieta! ";
                        } else {
                            echo "Qualcosa è andato storto!";
                        }
                    }
                }
                ?>
            </form>
        </div>

        <div class="diet-plan">
            <?php
            // MANTENIMENTO
            $servername = "localhost";
            $username = "root"; // Sostituisci con il tuo nome utente del database
            $password = ""; // Sostituisci con la tua password del database
            $dbname = "fittofit"; // Sostituisci con il nome del tuo database
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            $sql_titolo = "SELECT titolo FROM dieta LIMIT 1, 1";
            $result_titolo = $conn->query($sql_titolo);

            if ($result_titolo->num_rows > 0) {
                // Output data of first row
                while ($row_titolo = $result_titolo->fetch_assoc()) {
                    $titolo =                    $row_titolo["titolo"];
                    echo "<h2>$titolo</h2>";
                }
            } else {
                echo "Nessun risultato trovato";
            }

            $sql_descrizione = "SELECT descrizione FROM dieta LIMIT 1, 1";
            $result_descrizione = $conn->query($sql_descrizione);

            if ($result_descrizione->num_rows > 0) {
                // Output data of first row
                while ($row_descrizione = $result_descrizione->fetch_assoc()) {
                    $descrizione = $row_descrizione["descrizione"];
                    echo "<p>$descrizione</p>";
                }
            } else {
                echo "0 risultati";
            }

            $conn->close();
            ?>
            
            <form id="form-dieta1" method="post">
                <input type="submit" value="Spiegazione" onclick="openPopup('<?php echo $titolo ?>', '<?php echo $descrizione ?>', event);">
                <input type="submit" name="BottoneDieta2" value="Scegli">

                <?php
                if (isset($_POST['BottoneDieta2'])) {
                    $id = $_SESSION['id'];
                    $nome = $_SESSION['nome'];
                    $cognome = $_SESSION['cognome'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "fittofit";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    if (isset($_POST['BottoneDieta2'])) {
                        $sql = "INSERT INTO piani_dieta (fk_id,dieta) VALUES ('$id','Dieta Mantenimento')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Grazie per aver scelto questa dieta! ";
                        } else {
                            echo "Qualcosa è andato storto!";
                        }
                    }
                }
                ?>
            </form>
        </div>

        <div class="diet-plan">
            <?php
            // IPOCALORICA
            $servername = "localhost";
            $username = "root"; // Sostituisci con il tuo nome utente del database
            $password = ""; // Sostituisci con la tua password del database
            $dbname = "fittofit"; // Sostituisci con il nome del tuo database
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            $sql_titolo = "SELECT titolo FROM dieta LIMIT 2, 1";
            $result_titolo = $conn->query($sql_titolo);

            if ($result_titolo->num_rows > 0) {
                // Output data of first row
                while ($row_titolo = $result_titolo->fetch_assoc()) {
                    $titolo = $row_titolo["titolo"];
                    echo "<h2>$titolo</h2>";
                }
            } else {
                echo "Nessun risultato trovato";
            }

            $sql_descrizione = "SELECT descrizione FROM dieta LIMIT 2, 1";
            $result_descrizione = $conn->query($sql_descrizione);

            if ($result_descrizione->num_rows > 0) {
                // Output data of first row
                while ($row_descrizione = $result_descrizione->fetch_assoc()) {
                    $descrizione = $row_descrizione["descrizione"];
                    echo "<p>$descrizione</p>";
                }
            } else {
                echo "0 risultati";
            }

            $conn->close();
            ?>

            <form id="form-dieta1" method="post">
                <input type="submit" value="Spiegazione" onclick="openPopup('<?php echo $titolo ?>', '<?php echo $descrizione ?>', event);">
                <input type="submit" name="BottoneDieta3" value="Scegli">

                <?php
                if (isset($_POST['BottoneDieta3'])) {
                    $id = $_SESSION['id'];
                    $nome = $_SESSION['nome'];
                    $cognome = $_SESSION['cognome'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "fittofit";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    if (isset($_POST['BottoneDieta3'])) {
                        $sql = "INSERT INTO piani_dieta (fk_id,dieta) VALUES ('$id','Dieta Ipocalorica')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Grazie per aver scelto questa dieta! ";
                        } else {
                            echo "Qualcosa è andato storto!";
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>

    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2 id="popup-title"></h2>
            <p id="popup-description"></p>
            <button onclick="closePopup()">Chiudi</button>
        </div>
    </div>

    <script>
        function openPopup(title, description, event) {
            event.preventDefault(); // Questa linea impedisce il comportamento predefinito del form (reindirizzamento)
            document.getElementById('popup-title').innerText = title;
            document.getElementById('popup-description').innerText = description;
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>


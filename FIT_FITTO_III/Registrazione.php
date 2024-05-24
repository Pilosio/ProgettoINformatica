<!DOCTYPE html>
<html>
<head>
    <title>Inserimento Dati nel Database</title>
    <style>
        body {
            background-image: url("Tricipite.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        h1 {
            font-size: 70px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
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
            text-align: center;
            margin: 20px 0;
        }

        .form-container {
            border-radius: 5px;
            background-color: rgba(242, 242, 242, 0.8);
            padding: 20px;
            width: 50%;
            max-width: 600px;
            text-align: center;
        }

        p {
            text-align: left;
            font-size: 25px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: red;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[name="BottoneInvia"] {
            width: 50%;
            background-color: red;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        #mac {
            padding: 10px 20px;
            background-color: red; 
            color: white; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <h1>Inserisci i tuoi dati per registrarti</h1>
    <form method="post" action="Registrazione.php" style="position: absolute; top: 10px; right: 10px;">
        <input type="submit" id="mac" name="ButtonExit" value="Exit">
        <?php if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
        } ?>
    </form>
    <div class="form-container">
        <form method="post" action="Registrazione.php">
            <p>Nome:</p><input type="text" name="nome"><br>
            <p>Cognome:</p><input type="text" name="cognome"><br>
            <p>Email:</p><input type="email" name="email"><br>
            <p>Password:</p><input type="password" name="password"><br>
            <input type="submit" name="BottoneInvia" value="Invia"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $admin = null;
                // Recupera i dati dal form
                $Conf = true;
                $emailErr = "Campi mancanti : <br>";
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $email = $_POST["email"];
                $password2 = $_POST["password"];
                if ($nome == "") {
                    $Conf = false;
                    $emailErr = $emailErr . " -Nome <br>";
                }
                if ($cognome == "") {
                    $Conf = false;
                    $emailErr = $emailErr . " -Cognome <br>";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $Conf = false;
                    $emailErr = $emailErr . "-Formato email non valido <br>";
                }
                if ($password2 == "") {
                    $Conf = false;
                    $emailErr = $emailErr . " -Password <br>";
                }
                if ($Conf) {
                    $password2 = md5($password2);
                    // Connessione al database
                    $servername = "localhost";
                    $username = "root"; // Sostituisci con il tuo nome utente del database
                    $password = ""; // Sostituisci con la tua password del database
                    $dbname = "fittofit"; // Sostituisci con il nome del tuo database
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Verifica della connessione
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }
                    if (isset($_POST['BottoneInvia'])) {
                        // Your code that you want to execute
                        $sql = "INSERT INTO utente (nome, cognome, password, email) VALUES ('$nome', '$cognome', '$password2', '$email')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Dati inseriti con successo nel DataBase! ";
                            header("Location: PaginaIniziale.php");
                        } else {
                            echo "Errore nell'inserimento !";
                        }
                    }
                } else {
                    echo $emailErr;
                }
            }
            ?>
        </form>
    </div>
</body>
</html>

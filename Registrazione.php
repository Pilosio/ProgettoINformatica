<!DOCTYPE html>
<html>
<head>
    <title>Inserimento Dati nel Database</title>
    <style>
        h1 {
            text-align: left;
            font-size: 70px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: red;
            text-transform: uppercase;
            text-shadow: 1px 1px 0px yellow,
                1px 2px 0px yellow,
                1px 3px 0px yellow,
                1px 4px 0px yellow,
                1px 5px 0px yellow,
                1px 6px 0px yellow,
                1px 10px 5px rgba(16, 16, 16, 0.5),
                1px 15px 10px rgba(16, 16, 16, 0.4),
                1px 20px 30px rgba(16, 16, 16, 0.3),
                1px 25px 50px rgba(16, 16, 16, 0.2);
        }

        h2 {
            color: red;
        }

        body {
            background-image: url("Tricipite.jpg");
            background-repeat: no-repeat;
            background-position: absolute;
            background-attachment: fixed;
            background-size: cover;
        }

        p {
            display: inline-block; /* Visualizza il paragrafo come elemento inline */
            text-align: left;
            font-size: 25px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: red;
            margin-right: 20px; /* Aggiungi margine a destra per separare l'elemento successivo */
        }

        input[type=submit] {
            display: inline-block; /* Visualizza l'input submit come elemento inline */
            width: 55%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>

<h1>Inserisci i tuoi dati per registrarti</h1>

<form method="post" action="registrazione.php">
    <p>Nome:</p><input type="text" name="nome"><br>
    <p>Cognome:</p><input type="text" name="cognome"><br>
    <p>Email:</p><input type="email" name="email"><br>
    <p>Password :</p><input type="password" name="password"><br>
    <p>Admin ?:</p><input type="checkbox" name="admin"><br>
    <input type="submit" name="bottone" value="Invia"><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati dal form
        $Conf = true;
        $emailErr = "Campi mancanti : <br>";
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $email = $_POST["email"];
        $password2 = $_POST["password"];
        $admin  = $_POST["admin"];


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
            if ($admin == true) {
                $admin2 = true;
            } else {
                $admin2 = false;
            }


            // Connessione al database
            $servername = "localhost";
            $username = "root"; // Sostituisci con il tuo nome utente del database
            $password = ""; // Sostituisci con la tua password del database
            $dbname = "tecnoteca"; // Sostituisci con il nome del tuo database

            $conn = new mysqli($servername, $username, $password, $dbname);


            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            if (isset($_POST['bottone'])) {
                // Your code that you want to execute

                $sql = "INSERT INTO utente (nome, cognome, email,password,admin) VALUES ('$nome', '$cognome', '$email','$password2','$admin2')";
                if ($conn->query($sql) === TRUE) {

                    echo "Dati inseriti con successo nel DataBase! ";
                    header("Location: PagPostRegistrazione.php");
                } else {
                    echo "Errore nell'inserimento !";
                }
            }
        }

    }


    ?>
</form>

</body>
</html>

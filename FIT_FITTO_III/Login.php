<?php
error_reporting(0);
ini_set('display_errors', 0);

$host = "localhost";
$username = "root"; // Sostituisci con il tuo nome utente del database
$password = ""; // Sostituisci con la tua password del database
$dbname = "fittofit"; // Sostituisci con il nome del tuo database
$email = "";
$nome = "";
$cognome = "";
$passwordGLS = "";
$id = "";
$flag = true;
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
// acquisizione dati dal form HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    //$passwordGLS = md5($passwordGLS);
    $passwordGLS = $_POST["password"];
    $passwordGLS = md5($passwordGLS);
    // lettura della tabella utenti

    if (isset($_POST['Invia'])) {
        $sql2 = "SELECT * FROM utente WHERE email='$email'and password='$passwordGLS'";
        $result2 = $conn->query($sql2);

        $cognome = $result2->fetch_assoc()["cognome"];
        $result2 = $conn->query($sql2);
        $nome = $result2->fetch_assoc()["nome"];
        $result2 = $conn->query($sql2);
        $id = $result2->fetch_assoc()["id"];

        $sql =  "SELECT * FROM utente WHERE email='$email'AND password='$passwordGLS'";
        #Inoltre la password viene crittografata con la funzione md5, applicando l’algoritmo MD5; in questo
        #modo nella tabella del database la password viene registrata non in chiaro, ma come una stringa di 32
        #cifre esadecimali (128 bit).
        if ($conn->query($sql) === TRUE) {
            //  echo "Dati inseriti con successo nel database!";
        } else {
            //  echo "Errore durante l'inserimento dei dati: " . $conn->error;
            $flag = false;
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $passwordGLS;
            $_SESSION['nome'] = $nome;
            $_SESSION['cognome'] = $cognome;

            header("Location: PaginaPostLogin.php");
        } else {
            // echo "Identificazione non riuscita: nome utente o password errati <br />";
            // echo "Torna a pagina di <a href=\"login.html\">login</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
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
            margin: 0;
        }

        p {
            text-align: left;
            font-size: 35px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: red; /* cambiato il colore del testo a rosso */
            text-transform: uppercase;
        }

        #mac {
            margin-left: 20px;
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 4px;
cursor: pointer;
}

input[name="email"],
input[name="password"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

body {
    background-image: url("stacco.jpg");
    background-repeat: no-repeat;
    background-position: absolute;
    background-attachment: fixed;
    background-size: cover;
}

input[name="Invia"],
input[name="Registrazione"] {
    width: 100%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: black;
}

.form-container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
</head>

<body>
    <div class="header">
        <h1>Effettua il login per accedere ai nostri piani</h1>
        <form action="Login.php" method="post">
            <input type="submit" id="mac" name="ButtonExit" value="Exit">
            <?php if (isset($_POST['ButtonExit'])) {
                header("Location: PaginaIniziale.php");
            } ?>
        </form>
    </div>

    <div class="form-container">
        <form action="Login.php" method="post">
            <label for="NomeMail">Inserisci la email:</label>
            <input type="email" name="email"><br>
            <label for="NomePw">Inserisci la password:</label>
            <input type="password" name="password" text-align=""><br>
            <input type="submit" name="Invia" value="Invia">
            <label for="Registrazione">Non ti sei ancora registrato?</label><br>
            <input type="submit" name="Registrazione" value="Clicca qui">
            <?php if (isset($_POST['Registrazione'])) {
                header("Location: Registrazione.php");
            } ?>
            <p>
                <?php
                if ($flag === FALSE) {
                    echo "Non sei ancora registrato. Registrati con il tasto sopra.";
                }
                ?>
            </p>
        </form>
    </div>
</body>

</html>

<?php
// Verifica se sono stati inviati dati tramite POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Pulisci e proteggi i dati inseriti dall'utente
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query per controllare se l'utente esiste nel database (usando prepared statements)
    $stmt = $conn->prepare("SELECT * FROM adminr WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se la query ha prodotto dei risultati
    if ($result->num_rows == 1) {
        // L'utente è autenticato con successo
        session_start();
        $_SESSION['email'] = $email;
        // Puoi aggiungere qui il codice per reindirizzare l'utente ad una pagina di successo o effettuare altre azioni
        header("Location: ADMINRECENSIONI.php"); // Esempio di reindirizzamento
        exit();
    } else {
        // Credenziali non valide
        $login_error = "Email o password non corretti. Riprova.";
    }

    // Chiudi la connessione al database
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form {
            text-align: center;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"],
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
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
     <form action="ADMIN.php" method="post">
        <input type="submit" id="mac" name="ButtonExit" value="Indietro">
        <?php if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
        } ?>
    </form>
    <div class="login-container">
        <h2>Login da Admin</h2>
        <?php if(isset($login_error)) { echo "<div class='error-message'>$login_error</div>"; } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

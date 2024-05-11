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
    $sql2 = "SELECT * FROM amministratore WHERE email='$email'and password='$passwordGLS'";
    $result2 = $conn->query($sql2);

    $cognome = $result2->fetch_assoc()["cognome"];
    $result2 = $conn->query($sql2);
    $nome = $result2->fetch_assoc()["nome"];
    $result2 = $conn->query($sql2);
    $id = $result2->fetch_assoc()["id"];

    $sql =  "SELECT * FROM amministratore WHERE email='$email'AND password='$passwordGLS'";
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

      header("Location: ADMIN.php");
    } else {
      // echo "Identificazione non riuscita: nome utente o password errati <br />";
      // echo "Torna a pagina di <a href=\"login.html\">login</a>";
    }
  }
}


?>




<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffcccc; /* Colore di sfondo rosso chiaro */
        }

        form {
            background-color: #ffd6d6; /* Sfondo del form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #990000; /* Testo rosso scuro */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #990000; /* Bordo rosso */
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #990000; /* Rosso scuro */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #770000; 
        }

       
        #backButton {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #990000; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #backButton:hover {
            background-color: #770000;
        }
    </style>
</head>

<body>
    
    <button id="backButton" onclick="goBack()">Indietro</button>

    <div>
        <form action="PaginaAccessoAdmin.php" method="post">
            <h2>Inserisci le credenziali da admin</h2>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login" name ="Invia">
        </form>
    </div>

    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>

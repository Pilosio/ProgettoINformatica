<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti Fornitori</title>
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

        .contact-info {
            margin-bottom: 30px;
        }

        .contact-info h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .contact-info p {
            margin-bottom: 5px;
        }

        .contact-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .contact-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .contact-form textarea {
            height: 150px;
        }

        .contact-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #555;
        }

        /* Stili per il bottone di ritorno */
        .back-button {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Lascia una tua recensione !</h1>

        <div class="contact-info">

            
        </div>

        <div class="contact-form">
           
            <form action="#" method="post">


                <label for="message">Messaggio:</label>
                <textarea id="message" name="MSG" required></textarea>

                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                session_start();
        $id = $_SESSION['id'];
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
        $email = $_SESSION['email'];
        
        // Recupera i dati dal form
        $Conf = true;
        $emailErr = "Campi mancanti : <br>";

        $MSG = $_POST["MSG"];           
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "fittofit"; 

            $conn = new mysqli($servername, $username, $password, $dbname);


            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            if (isset($_POST['BottoneInvia'])) {
                // Your code that you want to execute

                $sql = "INSERT INTO recensioni (nome,email,messaggio) VALUES ('$nome', '$email','$MSG')";
                if ($conn->query($sql) === TRUE) {

                    echo "Grazie per aver lasciato la tua opinione! ";
                    
                } else {
                    echo "Errore nell'inserimento !";
                }
            }
        }

    ?>
                <input type="submit" value="Invia"name ="BottoneInvia">
            </form>
        </div>

        
        <a href="PaginaPostLogin.php" class="back-button">Torna alla pagina precedente</a>
    </div>

</body>

</html>

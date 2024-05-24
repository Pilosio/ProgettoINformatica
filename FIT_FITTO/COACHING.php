<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching</title>
    <style>
      body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('alza.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }


        .trainer-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 50px;
        }

        .trainer-box {
            width: 30%;
            background-color: #f2f2f2;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .trainer-image {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .trainer-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .trainer-button:hover {
            background-color: black;
        }

        
        #backButton {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: red; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #backButton:hover {
            background-color: #990000; 
        }
    </style>
</head>

<body>
    
    <button id="backButton" onclick="goBack()">Indietro</button>

    <div class="trainer-container">
        <div class="trainer-box">
            <img class="trainer-image" src="trainer1.jpg" alt="Trainer 1">
            <h2>Marco Toro</h2>
            <p>Coach specializzato nel PowerLifting</p>
            <form action="COACHING.php" method="post">
                <input type="submit" class="trainer-button" name="trainer1" value="Scegli il primo Coach">
            </form>
            <?php
        if (isset($_POST['trainer1'])) {
            session_start();
        $id = $_SESSION['id'];
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "fittofit"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
            


            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            if (isset($_POST['trainer1'])) {
                // Your code that you want to execute

                $sql = "INSERT INTO piani_coach (fk_id,coach) VALUES ('$id','Marco Toro')";
                if ($conn->query($sql) === TRUE) {

                    echo "Grazie per aver scelto questo Coach! ";
                   
                } else {
                    echo "Qualcosa è andato storto!";
                }
            }
        }
        
        ?>

        </div>
        <div class="trainer-box">
            <img class="trainer-image" src="trainer2.jpg" alt="Trainer 2">
            <h2>Luca Tenace</h2>
            <p>Coach specializzato nel BodyBuilding</p>
            <form action="COACHING.php" method="post">
                <input type="submit" class="trainer-button" name="trainer2" value="Scegli il Secondo Coach">
            </form>
              <?php
        if (isset($_POST['trainer2'])) {
            session_start();
        $id = $_SESSION['id'];
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "fittofit"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
            


            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            if (isset($_POST['trainer2'])) {
                // Your code that you want to execute

                $sql = "INSERT INTO piani_coach (fk_id,coach) VALUES ('$id','Luca Tenace')";
                if ($conn->query($sql) === TRUE) {

                    echo "Grazie per aver scelto questo Coach! ";
                   
                } else {
                    echo "Qualcosa è andato storto!";
                }
            }
        }
        
        ?>
        </div>
        <div class="trainer-box">
            <img class="trainer-image" src="trainer3.jpg" alt="Trainer 3">
            <h2>Alessandra Montagna</h2>
            <p>Coach specializzato nel Crossfitting</p>
            <form action="COACHING.php" method="post">
                <input type="submit" class="trainer-button" name="trainer3" value="Scegli il terzo Coach">
            </form>
              <?php
        if (isset($_POST['trainer3'])) {
            session_start();
        $id = $_SESSION['id'];
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "fittofit"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
            


            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            if (isset($_POST['trainer3'])) {
                // Your code that you want to execute

                $sql = "INSERT INTO piani_coach (fk_id,coach) VALUES ('$id','Alessandra Montagna')";
                if ($conn->query($sql) === TRUE) {

                    echo "Grazie per aver scelto questo Coach! ";
                   
                } else {
                    echo "Qualcosa è andato storto!";
                }
            }
        }
        
        ?>
        </div>
    </div>

    
    <script>
        function goBack() {
            window.location.href = 'PaginaPostLogin.php';
        }
    </script>
</body>

</html>

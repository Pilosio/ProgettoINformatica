<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh; /* Altezza del viewport */
            display: flex;
        }

        .left-half,
        .right-half {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            position: relative; /* Per consentire il posizionamento assoluto */
        }

        .left-half {
            background-image: url("GOGGINSBUONO.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative; /* Assicura che il bottone sia posizionato correttamente */
        }

        .right-half {
            background-image: url("salutare.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .divider {
            position: absolute;
            width: 15px; /* Larghezza del contorno */
            height: 100%; /* Altezza uguale all'altezza della finestra */
            background-color: black; /* Colore del contorno */
            z-index: 1; /* Assicura che il contorno sia sopra le immagini */
            right: 50%; /* Posizionamento al centro tra le due colonne */
        }

        h1 {
            text-align: left;
            position: absolute;
            color: red;
            top: 20px;
            left: 20px;
            font-size: 45px;
            z-index: 2; /* Assicura che il testo sia sopra il contorno */
        }
        
        h2 {
            text-align: left;
            position: absolute;
            color: black;
            top: 90px;
            left: 20px;
            font-size: 25px;
            z-index: 2; /* Assicura che il testo sia sopra il contorno */
        }

        #mac {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            z-index: 2; /* Assicura che il pulsante sia sopra il contorno */
        }

        .big-button {
            background-color: #990000; /* Rosso scuro */
            color: white;
            border: none;
            padding: 40px 70px; /* Aumenta il padding per rendere il bottone più grande */
            font-size: 24px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Rimuove la sottolineatura del link */
        }

        .big-button:hover {
            background-color: #770000; /* Rosso più scuro al passaggio del mouse */
        }
    </style>
</head>

<body>
    <div class="left-half">
        <?php
        session_start();
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
        echo "<h1>Salve $nome $cognome! </h1><br>";
        ?>
        <h2>Sei pronto a sconvolgere il TUO fisico?</h2>
        <a href="COACHING.php" class="big-button">COACHING</a>
    </div>
    <div class="divider"></div> 
    <div class="right-half">
        <form action="PaginaPostLogin.php" method="post">
            <input type="submit" id="mac" name="ButtonExit" value="Exit">
        </form>
        <a href="DIETA.php" class="big-button">DIETA</a>

        <?php
        if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
            session_destroy();
        }
        ?>
    </div>
</body>

</html>

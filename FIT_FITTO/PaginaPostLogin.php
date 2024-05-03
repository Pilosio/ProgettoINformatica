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
            background-image: url("GOGGINS.jpeg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .right-half {
            background-image: url("salutare.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        h1 {
            text-align: left;
            position: absolute; 
            top: 20px;
            left: 20px; 
            font-size: 45px;
        }
                h2 {
            text-align: left;
            position: absolute; 
            top: 90px; 
            left: 20px; 
            font-size: 25px;
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

    </div>
    <div class="right-half">
        <form action="PaginaPostLogin.php" method="post">
            <input type="submit" id="mac" name="ButtonExit" value="Exit">
        </form>

        <?php
        if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
        }
        ?>
    </div>
</body>

</html>

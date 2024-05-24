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
            height: 100vh;
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
            position: relative;
        }

        .left-half {
            background-image: url("GOGGINSBUONO.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
        }

        .right-half {
            background-image: url("salutare.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .divider {
            position: absolute;
            width: 15px;
            height: 100%;
            background-color: black;
            z-index: 1;
            right: 50%;
        }

        h1 {
            text-align: left;
            position: absolute;
            color: red;
            top: 20px;
            left: 20px;
            font-size: 45px;
            z-index: 2;
        }
        
        h2 {
            text-align: left;
            position: absolute;
            color: black;
            top: 90px;
            left: 20px;
            font-size: 25px;
            z-index: 2;
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
            z-index: 2;
        }

        .big-button {
            background-color: #990000;
            color: white;
            border: none;
            padding: 40px 70px;
            font-size: 24px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .big-button:hover {
            background-color: #770000;
        }
                .recensioni-button {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .contatti-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="left-half">
        <?php
        session_start();
        $id = $_SESSION['id'];
        $nome =  $_SESSION['nome'];
        $cognome =  $_SESSION['cognome'];
        $emai = $_SESSION['email'];
        
        echo "<h1>Salve $nome $cognome $id </h1><br>";
        ?>
        <h2>Sei pronto a sconvolgere il TUO fisico?</h2>
        <a href="COACHING.php" class="big-button">COACHING</a>
        <a href="Contattaci.php" class="big-button recensioni-button">Recensioni</a>
    </div>
    <div class="divider"></div> 
    <div class="right-half">
        <form action="PaginaPostLogin.php" method="post">
            <input type="submit" id="mac" name="ButtonExit" value="Exit" onclick="confirmExit()">
        </form>
        <a href="DIETA.php" class="big-button">DIETA</a>
<a href="PIANI.php" class="big-button contatti-button">I MIEI PIANI</a>
        <?php
        if (isset($_POST['ButtonExit'])) {
            header("Location: PaginaIniziale.php");
            session_destroy();
        }
        ?>

        <script>
            function confirmExit() {
                if (confirm("Sicuro di voler Uscire?")) {
                    document.querySelector('form').submit();
                } else {
                    // L'utente ha annullato, non fare nulla
                }
            }
        </script>
    </div>
</body>

</html>
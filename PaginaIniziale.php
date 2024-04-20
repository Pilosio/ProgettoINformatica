<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("Sudore.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100vh; /* Altezza minima del viewport */
            position: relative;
        }

        h1 {
            text-align: center;
            font-size: 120px; 
            font-weight: 900; 
            font-family: 'Roboto', sans-serif;
            color: red; 
            text-transform: uppercase;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5); 
            position: absolute;
            top: 20px; 
            left: 350px;
        }

        .description-box {
            position: absolute;
            top: 300px;
            left: 200px;
            right: 200px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
        }

        .description-box p {
            font-weight: bold; 
            font-size: 20px;
            color: black;
            margin-bottom: 20px; /* Aggiungi spazio in basso al paragrafo */
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            font-size: 45px; 
            color: red;
            position: relative;
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5); 
            top: 450px; /* Aggiungi spazio sopra il titolo */
        }

        .secondary-description-box {
            position: absolute;
            top: calc(450px + 100px); /* Calcola l'altezza del titolo h2 più un margine */
            left: 200px;
            right: 200px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
        }

        .secondary-description-box p {
            font-weight: bold; 
            font-size: 20px;
            color: black;
            margin-bottom: 20px; /* Aggiungi spazio in basso al paragrafo */
        }

        .button-container {
            position: absolute;
            top: 10px;
            left: 20px;
        }
        .contenitoreadmin {
            position: absolute;
            top: 10px;
            left : 1700px
        }


        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-right: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }


    </style>
</head>

<body>

    <h1>FITTO FIT WORLD</h1>
    

    <div class="description-box">
        <p> FITTO FIT WORLD è una piattaforma online che ti aiuta a mantenere la forma fisica attraverso programmi di allenamento personalizzati, consigli nutrizionali e tanto altro. Entra a far parte della nostra community e raggiungi i tuoi obiettivi fitness in men che non si dica!</p>
    </div>

    <div class="button-container">
        <form action="PaginaIniziale.php" method="post">
            <input type="submit" name="Login" value="LOGIN">
            <input type="submit" name="Registrazione" value="REGISTRATI">
            <?php if (isset($_POST['Registrazione'])) {
        header("Location: Registrazione.php");
      } ?>
        </form>
    </div>

    <h2>Chi Siamo ?</h2>

    <div class="secondary-description-box">
        <p> FITTO FIT WORLD è il luogo perfetto per chi vuole prendersi cura del proprio corpo e della propria salute. Offriamo programmi di allenamento personalizzati, consigli nutrizionali, supporto della community e molto altro. Unisciti a noi oggi stesso e inizia il tuo viaggio verso una vita più sana e attiva!</p>
    </div>

  
    <div class="contenitoreadmin">
        <form action="PaginaIniziale.php" method="post">
            <input type="submit" name= "Admin" value="SEI UN ADMIN ?">
        </form>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Team</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .coach {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .coach img {
            border-radius: 50%;
            max-width: 150px;
            display: block;
            margin: 0 auto 10px;
        }

        .coach h2 {
            text-align: center;
            color: #333;
        }

        .coach p {
            text-align: center;
            color: #666;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
        }

        .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <header>
        <h1>Il Nostro Team di Coaching</h1>
    </header>

    <div class="container">
        <div class="coach">
            <img src="trainer1.jpg" alt="Coach 1">
            <h2>Marco Toro</h2>
            <p>Specializzato in fitness e nutrizione. Con 10 anni di esperienza nel settore.Specializzatonel PowerLifting</p>
        </div>

        <div class="coach">
            <img src="trainer2.jpg" alt="Coach 2">
            <h2>Luca Tenace</h2>
            <p>Consulente di benessere mentale e motivazionale. Aiuta le persone a superare gli ostacoli mentali. Coach di BodyBuilding</p>
        </div>

        <div class="coach">
            <img src="trainer3.jpg" alt="Coach 3">
            <h2>Alessandra Montagna</h2>
            <p>Coach di vita e sviluppo personale. Appassionata nel Crossfitting</p>
        </div>

        <div class="btn-container">
            <button class="btn" onclick="window.location.href='PaginaIniziale.php'">Torna alla Pagina Iniziale</button>
        </div>
    </div>

</body>

</html>

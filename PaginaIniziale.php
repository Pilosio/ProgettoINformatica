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

.description-box2 {
    position: absolute;
    top: calc(400px + 20px + 20px + 20px + 20px); /* Calcola la distanza dal primo description-box */
    left: 200px;
    width: 400px; /* Larghezza fissa */
    background-color: rgba(255, 255, 255, 0.9); /* Aumenta leggermente l'opacità */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Aggiungi ombra */
    font-family: 'Roboto', sans-serif; /* Utilizza il font Roboto */
    color: #333; /* Colore del testo più scuro */
    text-align: center; /* Allinea il testo al centro */
}

.description-box p {
    font-weight: bold; 
    font-size: 25px;
    color: black;
    margin-bottom: 20px; /* Aggiungi spazio in basso al paragrafo */
}

.description-box2 p {
    font-size: 24px; /* Aumenta la dimensione del testo */
    margin-bottom: 10px; /* Riduci lo spazio tra i paragrafi */
}

.description-box2 p:first-child {
    margin-top: 0; /* Rimuovi lo spazio sopra il primo paragrafo */
}

.description-box2 p:last-child {
    margin-bottom: 0; /* Rimuovi lo spazio sotto l'ultimo paragrafo */
}

.description-box2::after {
    content: ''; /* Aggiungi un elemento fittizio */
    display: block;
    clear: both; /* Pulisci l'elemento float */
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

/* Aggiungi stili per la barra di navigazione */
.navbar {
    background-color: rgba(255, 255, 255, 0.7);
    padding: 10px;
    border-radius: 5px;
    position: absolute;
    top: 20px;
    right: 20px; /* Posiziona la barra di navigazione in alto a destra */
}

.navbar a {
    text-decoration: none;
    color: red;
    font-weight: bold;
    margin-right: 20px;
    font-size: 28px; /* Aumenta le dimensioni del testo */
    padding: 10px 20px; /* Aggiungi spazio attorno al testo */
    border: 2px solid red; /* Aggiungi bordo */
    border-radius: 10px; /* Rendi i bordi arrotondati */
    transition: all 0.3s ease; /* Aggiungi effetto di transizione */
}

.navbar a:hover {
    color: darkred;
    background-color: red; /* Cambia il colore di sfondo al passaggio del mouse */
}

/* Stili per le recensioni */
.review-container {
    position: absolute;
    display: flex;
    flex-direction: row; /* Imposta il layout delle recensioni su riga */
    justify-content: space-around; /* Distribuisci uniformemente le recensioni lungo l'asse orizzontale */
    top: 750px; /* Sposta il container delle recensioni sotto la descrizione */
    left: 200px;
    right: 200px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 5px;
}

.review {
    border-left: 5px solid red;
    padding-left: 10px;
    width: 30%; /* Imposta la larghezza di ogni recensione */
}

.review p {
    font-size: 18px;
    color: black;
}

.review .author {
    font-weight: bold;
    margin-bottom: 5px;
}

/* Stili per il titolo delle recensioni */
.reviews-title {
    text-align: center;
    font-size: 50px;
    font-weight: bold;
    color: red;
    text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
    position: absolute;
    top: 600px; /* Posiziona il titolo sopra le recensioni */
    left: 50%;
    transform: translateX(-50%);
}


        </style>
    </head>

    <body>

        <!-- Barra di navigazione -->
       <div class="navbar">
        <a href="Registrazione.php">Registrati</a>
        <a href="Login.php">Login</a>
        <a href="ChiSiamo.php">Chi Siamo?</a>
        <a href="Contattaci.php">Contattaci</a>
        <a href="PaginaAccessoAdmin.php">Sei un Admin?</a>
    </div>

    <h1>FITTO FIT WORLD</h1>

    <div class="description-box">
        <p> FITTO FIT WORLD è una piattaforma online che ti aiuta a mantenere la forma fisica attraverso programmi di allenamento personalizzati, consigli nutrizionali e tanto altro. Entra a far parte della nostra community e raggiungi i tuoi obiettivi fitness in men che non si dica!</p>
    </div>

    <!-- Titolo delle recensioni -->
    <h3 class="reviews-title">Le recensioni dei nostri clienti</h3>

    <!-- Recensioni dei clienti -->
    <div class="review-container">
        <?php
                    $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "fittofit"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT nome, messaggio FROM recensioni";
        $result = $conn->query($sql);

        // Controlla se sono presenti risultati
        if ($result->num_rows > 0) {
            // Itera sui risultati e stampa le recensioni
            while ($row = $result->fetch_assoc()) {
                echo '<div class="review">';
                echo '<p class="author">' . $row['nome'] . '</p>';
                echo '<p>' . $row['messaggio'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>Nessuna recensione disponibile.</p>";
        }
        ?>
    </div>


    </body>

    </html>

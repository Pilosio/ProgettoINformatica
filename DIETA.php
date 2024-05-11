<html>

<head>

<body>
<form action="DIETA.php" method="post">

<input type="submit" id="mac" name="ButtonExit" value="Indietro">
      <?php if (isset($_POST['ButtonExit'])) {
      header("Location: PaginaPostLogin.php");
    } ?>
</form>

    <h1>dieta</h1>
</body>
<style>


#mac {
          
          top: 300px;
           margin-left: 1800px;
           padding: 10px 20px;
           background-color: red; 
           color: white; 
           border: none;
           border-radius: 4px;
           cursor: pointer;
       }
       input[type=submit]:hover {
    background-color: black;
  }
</style>
</head>
</html>
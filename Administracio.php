<html>
<link rel="stylesheet" href="css/administracio.css">
<head>

    <?php
    require_once('header.php');
    ?>


    <title>Inici</title>
</head>
<body>
<div class="container">
<h1>Pantalla administració</h1>

   <div class="t1">
    <?php
            $texto = file_get_contents("comanda.txt");
            $texto = nl2br($texto);
            echo $texto;
            echo "<hr>";
    ?>
    
    </div>
</div>
<form action="inici.php">
    <br><br>
    <input type="submit" name="boton" value="Inici">
</form>
</body>
</html>
<html>
<head>

    <?php
    require_once('header.php');
    ?>


    <title>Inici</title>
</head>
<body>
<h1>Pantalla administració</h1>

    <?php
            $texto = file_get_contents("../comanda.txt");
            $texto = nl2br($texto);
            echo $texto;
    ?>

<form action="inici.php">
    <br><br>
    <input type="submit" name="boton" value="Inici">
</form>
</body>
</html>
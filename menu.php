<html>
<head>

    <?php
    require_once('header.php');
    ?>

    <title>Inici</title>
</head>
<body>
<h1>Menu</h1>
<form action="comandav.php">
    <input type="submit" name="boton" value="Validació comanda">
</form>
<form action="inici.php">
    <input type="submit" name="boton" value="🡨">
</form>
<?php

    $bocata = bocata("Jamon", "Queso");
    var_dump($bocata);
    for ($i=0;$i<2;$i++){

        $HTML= "<ul>"+$bocata+"</ul>";

    }

require_once('foother.php');
?>

</body>

</html>
<html>
<head>

    <?php
    require_once('header.php');
    ?>

    <title>comandaf</title>
</head>
<body>
<h1>Finalització de comanda</h1>

<?php

$horaActual = date("h");
$minActual = date("i");
$restante = (86400 - (($horaActual * 60 * 60) + ($minActual * 60)));
echo "El tiempo de cookie que queda es: " . $restante . " Segundos";


echo "<br>";
if( isset( $_COOKIE["Limitador"]) )
{
    echo "La cookie ya existe";
}
else {
    echo "Si no existe, la creamos";

// Se crea cookie con duración x hasta las 00:00
    setcookie("Limitador", 54321, time() + $restante, "/");

}
?>

<form action="comandav.php">
    <input type="submit" name="boton" value="🡨">
</form>
</body>
</html>
<?php
session_start();
?>

<html>
<head>

    <?php
    require_once('header.php');
    ?>
<link rel="stylesheet" href="css/comandaf.css">
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
<?php
if (isset($_SESSION["preuTotal"]))
{
    echo "preu total: ". $_SESSION["preuTotal"];
}

?>
<div class="Gracies">
<h1>Comanda correctament Enviada</h1>
<h3>Moltes Gracies per la seva comanda</h3>
</div>
<div class="Tiquethora">
<?php
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo "<b>Dia: $DateAndTime.</b>";
echo "<hr>"



?>
</div>
</body>
</html>
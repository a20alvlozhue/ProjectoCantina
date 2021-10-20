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
echo "<br>";
if( isset( $_COOKIE["Limitador"]) )
{
    echo "La cookie ya existe";
    echo "El valor de la cookie Limitador despues de crearla: " . $_COOKIE["Limitador"];
}
else {
    echo "Si no existe, la creamos";

// Se crea cookie con duración de un minuto
    setcookie("Limitador", 54321, time() + 10, "/");

}



?>

<form action="comandav.php">
    <input type="submit" name="boton" value="🡨">
</form>
</body>
</html>
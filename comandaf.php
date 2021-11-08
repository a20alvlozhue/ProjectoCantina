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


<div class="Tiquethora">
<?php
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo "<b>Dia: $DateAndTime.</b>";
echo "<hr>"
?>
<div class="Gracies">
<h1>Comanda correctament Enviada</h1>
<h3>Moltes Gracies per la seva comanda</h3>
</div>
<?php
if (isset($_SESSION["preuTotal"]))
{
    echo "Preu total: ". $_SESSION["preuTotal"];  
	echo "€";
}

?>
<?php
	$nombreFichero="comanda.txt";
	$fh=fopen($nombreFichero,"a+") or die("Se produjo un error al crear el archivo");
	
	$texto = <<<_END
		\n
		Informacion del usuario:
		Nombre: $_POST[name]
		Telefono: $_POST[tlf]
		Correo: $_POST[email]
		Comanda: $_SESSION[preuTotal]€ 
		<hr>
	_END;

	fwrite($fh, $texto);
	fclose($fh);

	session_destroy();
	?>
</div>
</body>
</html>
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


$productesMati = json_decode(file_get_contents('json/menuM.json'),true);
$productesTarda = json_decode(file_get_contents('json/menuT.json'),true);
$totsElsProductes = array_merge($productesMati,$productesTarda);
//  print_r($totsElsProductes);
$menu = $totsElsProductes;

$total = 0;
// print_r($_POST);
foreach ($_POST as $id => $cantidadProducto) {
    $key = array_search($id, array_column($menu, 'id'));
    if (intval($cantidadProducto) > 0 && $key > -1) {
        echo "<p>Nombre de producto: " . $menu[$key]["nom"]. "</p>".
        "<p>cantidad producto: " . $cantidadProducto . "</p>".
        "<p>Precio: " . $menu[$key]["preu"]. "</p><hr>";

        $total += $menu[$key]["preu"] * $cantidadProducto; //calcular precio total
    // $_SESSION["nom"] = $menu[$key]["preu"];
    }
}
$_SESSION["preuTotal"] = $total;
$data2 = file_get_contents('json/menuT.json');
"<br><br>";
echo "<b>Preu Total de los productos: " . $total . "€</b>";
?>
</div>
</body>
</html>
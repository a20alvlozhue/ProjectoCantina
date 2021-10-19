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

<?php
    $data = file_get_contents("package.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        
    }


?>
<form action="comandav.php">
    <input type="submit" name="boton" value="Validació comanda">
</form>

<form action="inici.php">
    <input type="submit" name="boton" value="🡨">
</form>
<?php
require_once('foother.php');
?>
</body>

</html>
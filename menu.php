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
    $data = file_get_contents("menu.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod) {
        echo $prod["nom"]."."$prod["preu"].'€'.$prod["torn"];
        echo "<img src='".$prod["img"]."'></br>";

    }   
        
?>

<?php
require_once('foother.php');
?>

</body>

</html>
<html>
<head>

    <?php
    require_once('header.php');
    ?>

    <title>Inici</title>
</head>

<style>

    .h1menu{
        color: black;
    }

    .abajo{
        text-align: center;
    }


</style>
<body>
<h1 class="h1menu">Menu</h1>

<?php
    $data = file_get_contents("package.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        
    }
?>

<div class="abajo">
    <form action="comandav.php">
        <input type="submit" name="boton" value="Validació comanda">
    </form>

    <form action="inici.php">
        <input type="submit" name="boton" value="🡨">
    </form>
</div>

<?php
require_once('foother.php');
?>
</body>

</html>
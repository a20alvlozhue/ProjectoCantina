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

    #cuadricula {
  display: grid;
  /*
  grid-template-rows: [r1] 1fr [r2] 2fr [r3];
  grid-template-columns: [c1] 1fr [c2] 1fr [c3] 1fr [c4];
  */
  
  grid-template:[r1] 1fr [r2] 7fr [r3] 
              / [c1] 1fr [c2] 1fr [c3] 1fr [c4];
  grid-gap:1em;
  
}

.item {
  padding:1em;
  border: 1px solid #000;
  border-radius: 10px;
  background-color: #3E989B;
  background-color: var(--color);
  text-align: center;
}

.item:nth-child(5){
grid-column: c2 / c3;
}

body {
  font-family: Verdana, Geneva, sans-serif;
  line-height: 2em;
  background-color:#222;
}

</style>
<body>
<h1 class="h1menu">Menu</h1>

<div id="cuadricula">
<div class="item" style="--color:#3E989B;"><p>Bocatas Freds</p></div>
<div class="item" style="--color:#6DB465;"><p>Bocatas Calents</p></div>
<div class="item" style="--color:#F2C14E;"><p>Bocatas Vegetarians</p></div>
<div class="item" style="--color:#F78154;"><p>
<?php
    $data = file_get_contents("menu.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        
    }
?>
</p></div>


<div class="item" style="--color:#C87694;"><p>
<?php
    $data = file_get_contents("menu.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        
        
    }
?>
    <input type="button" value="+">
    <input type="button" value="-">  
       
    

</p></div>

<div class="item" style="--color:#C87694;"><p>
<?php
    $data = file_get_contents("menu.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        
    }
?>
</p></div>
</div>




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
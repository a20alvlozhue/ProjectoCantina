<?php 

//Si la cookie existe, nos envia a la pagina error.php

 if (isset($_COOKIE['Limitador'])){
    header('Location: error.php');
}

?>
<html>
<head>

    <?php
    require_once('header.php');
    ?>
    
    <script type="text/javascript" src="js/menu.js"></script>

    <title>Inici</title>
    
    <link rel="stylesheet" href="css/menu.css">

</head>



<body>


<?php
echo "<br>";
if( isset( $_COOKIE["Limitador"]) )
{
    echo "Existe";
}
else {
    echo "No existe, puede continuar";
}
?>

<form action="comandav.php" method="POST">
<div id="totmati">
<h1 class="h1menu">Menu Mati</h1>
<div id="cuadricula">
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Freds</u></b></h3></div>





<div class="item" style="--color:#6FD0EA;">
<div id='menumati'>
<?php
                        $data = file_get_contents("json/menuM.json");
                        $menuMati = json_decode($data, true);
                        mostrarProd($menuMati);

                        function mostrarProd($menuMati){                
                            $var = 0;
                            foreach ($menuMati as $prod) {
                                if($var == 0){
                                    echo "<div class='item".($var+1)."'></div>";
                                    $var++;
                                }else if ($var == 5){
                                    echo "<div class='gc".($var+1)."'></div>";
                                    $var++;
                                }else if($var == 10){
                                    echo "<div class='item".($var+1)."'></div>";
                                    $var++;
                                }         
                                echo "<div class='gc".($var+1). " pr-grid'>";
                                    echo '<div class="img">
                                            <img src='.$prod["img"].' class="foto">
                                          </div>
                                          <div class="text">
                                            <input type="button" id="quitar" class="quitar" value="-">
                                            <span>'.$prod["nom"].  '</span><span> '.$prod["preu"].'€</span>
                                            <input type="hidden"  value="0" name="'.$prod["id"].'" id="M'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   

</div>

</p></div>
</div>
</div>


<div id="tottarda">
<h1>Menu Tarda</h1>
<div id="cuadricula">

<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Calents</u></b></h3></div>


<div id='menutarda'>
<?php
                        $data = file_get_contents("json/menuT.json");
                        $menuMati = json_decode($data, true);
                        mostrarProd25($menuMati);

                        function mostrarProd25($menuMati){                
                            $var = 0;
                            foreach ($menuMati as $prod) {
                                if($var == 0){
                                    echo "<div class='item".($var+1)."'></div>";
                                    $var++;
                                }else if ($var == 5){
                                    echo "<div class='gc".($var+1)."'></div>";
                                    $var++;
                                }else if($var == 10){
                                    echo "<div class='item".($var+1)."'></div>";
                                    $var++;
                                }         
                                echo "<div class='gc".($var+1). " pr-grid'>";
                                    echo '<div class="img">
                                            <img src='.$prod["img"].' class="foto">
                                          </div>
                                          <div class="text">
                                            <input type="button" id="quitar" class="quitar" value="-">
                                            <span>'.$prod["nom"].  '</span><span> '.$prod["preu"].'€</span>
                                            <input type="hidden" value="0"  name="'.$prod["id"].'" id="T'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   
</div>


</div>
</div>

<input type="submit" name="boton" value="Validació comanda">

</form>
<div class="ticket">
                    <h3><b>Ticket</b></h3>
                    <ul>
                    <div id="carrito">
                        
                    </div>
                    </ul>
                    <div>
                        <h4>Total: <span id="total">0</span><span>€</span>
                    </div>
                </div>
            </div>
    
       
        <script src="js/menu.js"></script>        
     

<hr>
<br></br>


<div class="abajo">
  

    <form action="inici.php">
        <input type="submit" name="boton" value="🡨">
    </form>
</div>

<?php
require_once('foother.php');
?>
</body>

</html>
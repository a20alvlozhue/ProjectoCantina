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
<div id="totmati">
<h1 class="h1menu">Menu Mati</h1>
<div id="cuadricula">
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Freds</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Calents</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Vegetarians</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Begudes</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Complements</u></b></h3></div>


<div class="item" style="--color:#6FD0EA;">


<div id='menu'>
<?php
                        $data = file_get_contents("json/menu.json");
                        $menuMati = json_decode($data, true);
                        mostrarProd2($menuMati);

                        function mostrarProd2($menuMati){                
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   
</div>



<div class="item" style="--color:#6FD0EA;">
<div id='menum'>
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   

</div>

<div class="item" style="--color:#6FD0EA;">
<div id='menut'>
<?php
                        $data = file_get_contents("json/menuT.json");
                        $menuTarda = json_decode($data, true);
                        mostrarProd1($menuTarda);

                        function mostrarProd1($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>
</div>

<div class="item" style="--color:#6FD0EA;">
<div id='postre'>
<?php
                        $data = file_get_contents("json/postres.json");
                        $menuTarda = json_decode($data, true);
                        mostrarPostres($menuTarda);

                        function mostrarPostres($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
     </div>
</div>
<div class="item" style="--color:#6FD0EA;">

<div id='comple'>
<?php
                        $data = file_get_contents("json/complements.json");
                        $menuTarda = json_decode($data, true);
                        mostrarcomplementos($menuTarda);

                        function mostrarcomplementos($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
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
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Freds</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Calents</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Vegetarians</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Begudes</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Complements</u></b></h3></div>


<div class="item" style="--color:#6FD0EA;">


<div id='menu'>
<?php
                        $data = file_get_contents("json/menu.json");
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   
</div>



<div class="item" style="--color:#6FD0EA;">
<div id='menum'>
<?php
                        $data = file_get_contents("json/menuM.json");
                        $menuMati = json_decode($data, true);
                        mostrarProd5($menuMati);

                        function mostrarProd5($menuMati){                
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>   

</div>

<div class="item" style="--color:#6FD0EA;">
<div id='menut'>
<?php
                        $data = file_get_contents("json/menuT.json");
                        $menuTarda = json_decode($data, true);
                        mostrarProd15($menuTarda);

                        function mostrarProd15($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
</div>
</div>

<div class="item" style="--color:#6FD0EA;">
<div id='postre'>
<?php
                        $data = file_get_contents("json/postres.json");
                        $menuTarda = json_decode($data, true);
                        mostrarPostres5($menuTarda);

                        function mostrarPostres5($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
                                            <input type="button" id="añadir" class="añadir" value="+">
                                          </div></div>';
                                          echo "</br>";
                                $var++; 
                            }
                            
                        }
                    ?>
     </div>
</div>
<div class="item" style="--color:#6FD0EA;">

<div id='comple'>
<?php
                        $data = file_get_contents("json/complements.json");
                        $menuTarda = json_decode($data, true);
                        mostrarcomplementos5($menuTarda);

                        function mostrarcomplementos5($menuTarda){                
                            $var = 0;
                            foreach ($menuTarda as $prod) {
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
                                            <input type="hidden" id="hidden" value="'.$prod["id"].'">
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
        </form>
       
        <script src="js/menu.js"></script>
        <script src="js/postre.js"></script>
        <script src="js/complement.js"></script>
        <script src="js/menuM.js"></script>
        <script src="js/menuT.js"></script>




<hr>
<br></br>


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
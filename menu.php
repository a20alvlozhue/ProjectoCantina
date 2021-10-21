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
    
    <script type="text/javascript" src="js/compra.js"></script>

    <title>Inici</title>
    


</head>

<style>

    .foto{
        width: 200px;
    }
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
  font-family: Courier New;
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

<div id="cuadricula">
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Freds</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Calents</u></b></h3></div>
<div class="item" style="--color:#2D9BE8;"><h3><b><u>Bocatas Vegetarians</u></b></h3></div>
<div class="item" style="--color:#6FD0EA;"><p>
<?php
        $data = file_get_contents("json/menu.json");
        $products = json_decode($data, true);
        foreach ($products as $prod) {
            echo "<div id='".$prod["id"]."' >".$prod["nom"]."</br>";
            echo "<img src='".$prod["img"]."' width=200px height=100px ></br>";
            echo $prod["preu"]."€ <br>"; 
            echo "<input type='button' value='+' class='afegir'></input>";
            echo "<input type='text' value='0' id='i".$prod["id"]."' >";
            echo "<input type='button' value='-' class='treure'></input><br><br></div>";               
        }
    ?>
</p></div>



<div class="item" style="--color:#6FD0EA;"><p>
<?php
    $data = file_get_contents("json/menuM.json");
    $menuMati = json_decode($data, true);
    foreach ($menuMati as $prod){
        echo $prod["nom"]." </br>".$prod["preu"]."€ </br>";
        echo "<img src=".$prod["img"]." width='100px'></br>";
        echo "<input type='button' value='-' class='afegir'></input>";
        echo "<input type='text' value='0' id='i'>";
        echo "<input type='button' value='+' class='treure'></input></br>";
    }
?>
       
    

</p></div>

<div class="item" style="--color:#6FD0EA;"><p>
<div id='menu'>
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
                                $var++; 
                            }
                            echo "<div class='gc".($var+1)."'><input type='submit' value='Finalitzar compra'></div>";
                        }
                    ?>
</div>
</p></div>
</div>

<div class="ticket">
                    <h3>Ticket</h3>
                    <div id="carrito">
                        
                    </div>
                    <div>
                        <h4>Total: <span id="total">0</span><span>€</span>
                    </div>
                </div>
            </div>
        </form>
       
        <script>
            var tot;
            document.getElementById("menu").addEventListener("click", function(e){
                if(e.target.classList.contains("añadir")){
                    var idProd = e.target.parentElement.childNodes[6].value;
                    var nomProd = e.target.parentElement.childNodes[3].innerHTML;
                    var preuProd = e.target.parentElement.childNodes[4].innerHTML; 
                    element = document.getElementById("prod"+idProd);
                    if(typeof(element) != 'undefined' && element != null){
                        document.getElementById("preu"+idProd).innerHTML++;
                    }else{
                        document.getElementById("carrito").insertAdjacentHTML("beforeend", "<p id=prod"+idProd+">"+nomProd+ " <span id=preu"+idProd+">1</span></p>");
                    }
                    document.getElementById("total").innerHTML = (parseFloat(preuProd) + parseFloat(document.getElementById("total").innerHTML));
                }
                else if(e.target.classList.contains("quitar")){
                    var idProd = e.target.parentElement.childNodes[6].value;
                    var nomProd = e.target.parentElement.childNodes[3].innerHTML;
                    var preuProd = e.target.parentElement.childNodes[4].innerHTML;
                    element = document.getElementById("prod"+idProd);
                    if(typeof(element) != 'undefined' && element != null){
                        document.getElementById("preu"+idProd).innerHTML--;
                        document.getElementById("total").innerHTML = parseFloat(document.getElementById("total").innerHTML) - (parseFloat(preuProd) );
                        if(document.getElementById("preu"+idProd).innerHTML == 0){
                            element.remove()
                        }
                    }
                }
            });
        </script>




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
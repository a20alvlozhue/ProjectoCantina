<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Validació comanda</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/comandav.css">
</head>

<body>
<?php include("header.php") ?>

<!--
  **** Mostrar dades compra ****
-->

<h1>Validació comanda</h1>


<div class="dades_comanda">
                <div class="tit">
                    <h2>Dades comanda</h2>
                    <?php

                            $data = file_get_contents('json/menu.json');

                            $menuMati = json_decode($data, true);

                            $total = 0;
                            foreach ($_POST as $id => $value) {
                                echo "hola";
                                if ($value != 0) {
                                    echo "Nombre de producto: " . $menuMati[$nom]["nom"] .
                                    $total += $menuMati[$preu]["preu"] * $value;
                                    $_SESSION["nom"] = $menuMati[$preu]["preu"];
                                }
                            }
                            "<br><br>";
                            echo "Preu Total de los productos: " . $total . "€";

                        ?>
                    
                </div>
            </div>




    <form method="post" name="form" action="comandaf.php">

        <div class="formulari">
            <div class="form_cont">
            <h3>Formulari Validacio</h3>
                <div>
                    <label for="name">Nom</label>
                    <input name="name"  type="text" id="nom">
                </div>
                <br>
                <div>
                    <label for="tlf">Telèfon</label>
                    <input name="tlf"  type="tel" id="tlf" placeholder="+34 000000000" width="10px">

                </div>
                <br>
                <div>
                    <label for="email">Correu electrònic </label>
                    <input name="email"  type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
                </div>
            </div>
            <br>
            <div class="sub">
                <input type="submit" value="Comprar" id="submit">
            </div>

        </div>

    </form>

</div>

<script>

    
    const err = ["Introdueix nom", "Introdueix un telèfon", "Telèfon no numeric", "Número de telèfon incorrecte (9 dígits)", "Introdueix un email", "Email incorrecte (@inspedrables.cat)" ];

    
    window.onload = function(){
        document.getElementById("nom").focus();
    }

    
    document.getElementById("submit").addEventListener("click", function(e){
        var n, text="", error = 0;

        if(errorNom()){ text += ("<b>"+err[0]+"!</b></br>"); error = 1;}

        n = errorTel();
        if(n){ text += ("<b>"+err[n]+"!</b></br>"); error = 1; }

        n = errorEmail();
        if(n){ text += ("<b>"+err[n]+"!</b>"); error = 1;}

        if(error){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error!...',
                html: text
            });
        }
    });


    

    function errorNom(){
        return (document.getElementById("nom").value === "") ? true : false;
    }

    function errorTel(){
        let tlf = document.getElementById("tlf").value, n;
        if(tlf == ""){ n = 1; }
        else if(!(/^[0-9]+$/.test(tlf))){ n = 2; }
        else if (tlf.length != 9){ n = 3; }
        else{ n = 0; }
        return n;
    }

    function errorEmail() {
        let correu = document.getElementById("correu").value, n;
        if(correu == ""){ n = 4; }
        else if(!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(correu))){ n = 5; }
        else{ n = 0; }
        return n;
    }

</script>
<form action="menu.php">
        <input type="submit" name="boton" value="🡨">
    </form>




<?php include ("foother.php"); ?>
</body>
</html>
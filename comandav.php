<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Validació comanda</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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

                            $data = file_get_contents('json/menuM.json');

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



                <form class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
        <div class="valid-feedback">
        Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
        <div class="valid-feedback">
        Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Username</label>
        <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
            Please choose a username.
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationCustom03" class="form-label">City</label>
        <input type="text" class="form-control" id="validationCustom03" required>
        <div class="invalid-feedback">
        Please provide a valid city.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">State</label>
        <select class="form-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option>...</option>
        </select>
        <div class="invalid-feedback">
        Please select a valid state.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Zip</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
        Please provide a valid zip.
        </div>
    </div>
    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
    </form>
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
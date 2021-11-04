<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
    require_once('header.php');
    ?>


    <title>Inici</title>
</head>
<body>
<h1>Pantalla administració</h1>

</head>

<body>
<script  language=JavaScript> 
function go(){

if (document.form.password.value=='admin' && document.form.login.value=='admin'){ 
        document.form.submit(); 
    } 
    else{ 
         alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
    } 
} 
</script> 
<FORM name=form action="Administracio2.php">

<P>Usuario:    <INPUT type=text name=login> 
<P>Contraseña: <INPUT type=password name=password> 
<INPUT onclick=go() type=button value=Acceder>

</FORM> 
</body>
</html>

<form action="inici.php">
    <br><br>
    <input type="submit" name="boton" value="Inici">
</form>

</body>
</html>
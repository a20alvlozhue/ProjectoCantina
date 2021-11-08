<?php
  
  $imageErrorMessage = "";
  $creationMessage = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $newProduct = array("id"=>null, "allowed"=>null, "activated" => null, "productName"=> null, "imageId" => null,"price"=>null);
    CheckProductId();
    CheckSchedule();
    CheckActivation();
    CheckProductName();
    CheckProductPrice();
    if($_FILES["ImageName"]["error"] == 0) //significa que se ha subido una imagen si o si
    {
      $target_dir = "../img";
      $target_file = $target_dir . basename($_FILES["ImageName"]["name"]);
      if(CheckImage($target_file))
      {
        echo "entro";
        TryUpload($target_file);
      }
    }
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
  }
  
  function CheckProductId()
  {
    if($_POST['productId'] == '')
    {
      echo 'La id no puede estar vacia';
    }
    else if(!is_numeric($_POST['productId']))
    {
      echo 'La id no puede tener letras/caracteres';
    }
    else
    {
      $GLOBALS['newProduct']['id'] = intval($_POST['productId']);
    }
  }
  function CheckProductName()
  {
    if($_POST['productName'] == '')
    {
      echo 'El nombre del producto no puede estar vacio';
    }
    else if(is_numeric($_POST['productName']))
    {
      echo 'El nombre no tiene que ser un numero';
    }
    else
    {
      $GLOBALS['newProduct']['productName'] = htmlspecialchars($_POST['productName']);
    }
  }
  function CheckActivation()
  {
    if(!is_numeric($_POST['isActived']))
    {
      echo 'El Horario introducido no es correcto';
    }
    else
    {
      $GLOBALS['newProduct']['activated'] = floatval($_POST['isActived']);
    }
  }
  function CheckSchedule()
  {
    if(!is_numeric($_POST['schedule']))
    {
      echo 'El Horario introducido no es correcto';
    }
    else
    {
      $GLOBALS['newProduct']['allowed'] = floatval($_POST['schedule']);
    }
  }
  function CheckProductPrice()
  {
    if($_POST['productPrice'] == '')
    {
      echo 'El precio del producto no puede estar vacio';
    }
    else if(is_numeric($_POST['productPrice']) == false)
    {
      echo 'El precio del producto tiene que ser numerico: '.$_POST['productPrice'];
    }
    else
    {
      $GLOBALS['newProduct']['price'] = $_POST['productPrice'];
    }
  }
  function CheckImage($target_file)
  {
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["ImageName"]["tmp_name"]);
      if($check !== false) {
        $GLOBALS['imageErrorMessage'] = "L'arxiu és una imatge - " . $check["mime"] . ".";
      } else {
        $GLOBALS['imageErrorMessage'] = "L'arxiu no és una imatge.";
        return false;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $GLOBALS['imageErrorMessage'] = "L'arxiu ja existeix.";
      return false;
    }       
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $GLOBALS['imageErrorMessage'] = "Només s'accepten fitxers del tipus JPG, JPEG, PNG.";
      return false;
    }
    // if everything is ok, try to upload file
    
    $GLOBALS['newProduct']['imageId'] = $target_file;
    return true;
  }

  function TryUpload($target_file)
  {
    $allOk = true;
    foreach($GLOBALS['newProduct'] as $key => $value){
      //echo "<p>".$key ." | esnull?".is_null($value) ." | ".$value."</p>"; // activate in case of debugging variables
      if(is_null($value))
      {
        $allOk = false;
      }
    }
    
    if($allOk)
    {
      move_uploaded_file($_FILES["ImageName"]["tmp_name"], $target_file);
      $fileName = "json/menuM.json";
      $jsonProducts = file_get_contents($fileName);
      $productsObject = json_decode($jsonProducts,true);
      array_push($productsObject, $GLOBALS['newProduct']);
      file_put_contents($fileName, json_encode($productsObject, JSON_PRETTY_PRINT));

      //message
      $GLOBALS['creationMessage'] = "Se ha creado el producto correctamente!";
    }
  }
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/SweetAlert2/dist/sweetalert2.all.min.js"></script>
    <link rel="defaultsheet" href="../css/normalize.css">
    <link rel="stylesheet" href="./css/addproduct.css">
    <title>Afegir productes</title>
    <?php
        require_once('header.php');
    ?>
</head>
<body>
    <div class="general-title">
        <form action="inici.php">
        <br><br>
        <input type="submit" name="boton" value="Inici">
        </form>
        <h1>AFEGEIX UN PRODUCTE</h1>
    </div>
  <div class="general-background">
    <div class="grid-container">
      <form id="newProduct" method="POST" action="./AddProduct.php" enctype="multipart/form-data">
        <div class="grid">
          <div><label for="productId" class="info-text">Id del producte:</label></div><div ><input type="text" name="productId" id="productId" value="" class="input"></div>
          <div><label for="productName" class="info-text">Nom del producte</label></div><div ><input type="text" name="productName" id="productName" value="" class="input"></div>
          <div><label for="ImageName" class="info-text">Imatge del producte</label></div><div ><input type="file" accept=".png, .jpg, .jpeg" name="ImageName" value=""><?php  echo $GLOBALS['imageErrorMessage'] ?></div>
          <div><label for="isActived" class="info-text">Activat?</label></div>
          <div>        
              <select name="isActived" id="isActived">
                  <option value="1">Activat</option>
                  <option value="0">Desactivat</option>
              </select>
          </div>
          <div><label for="schedule" class="info-text">Horari:</label></div>
          <div>        
              <select name="schedule" id="schedule">
                  <option value="0">Matí</option>
                  <option value="1">Tarde</option>
                  <option value="2">Sempre</option>
              </select>
          </div>
          <div><label for="productPrice" class="info-text">Preu del producte:</label></div><div><input type="text" name="productPrice" id="productPrice" value="" class="input"></div>    
          <div class="button"><button type="button" id="AddButton" class="button-confirm">Crear</button></div>
          </div>
      </form>

    </div>
    <form action="Administracio.php">
        <input type="submit" class="btn btn-primary" name="boton" value="🡨">
    </form>
    
  </div>
    <script src="./js/AddProduct.js"></script>
    
    <?php echo $GLOBALS['creationMessage']?>
    <?php
    require_once('foother.php');
    ?>
</body>
</html>
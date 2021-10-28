<html>
<head>

<?php
require_once('header.php');
?>
    <title>Inici</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/carousel.css">
</head>
<body>

<h1 class="text-center">Inici</h1>

<div class="row">
  <div class="col-sm-1">
    <a href="menu.php" class="btn btn-primary">MENU</a>
  </div>
  <div class="col-sm-1">
    <form action="/adminstracio/Administracio.php">
        
        <input type="submit" class="btn btn-primary" name="boton" value="Administracio">
    </form>
  </div>
</div>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
      <div class="carousel">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/desayuno1.png" class="d-block w-100" width="100px" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/desayuno2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/desayuno3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</br>

<?php
require_once('foother.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

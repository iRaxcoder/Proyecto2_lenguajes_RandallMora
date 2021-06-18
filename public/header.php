<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenid@ <?php echo $_SESSION["usuario"] ?></title>
  <link rel="stylesheet" href="public/css/header.css">
  <script type="text/javascript" src="public/js/jquery.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>

  <!-- header -->
  <div class="jumbotron">
    <h1>Venta de articulos ArtiMax CR</h1>
    <p>Venta de articulos de primera calidad. Productos nacionales e internacionales con los mejores precios</p>
  </div>

  <!-- nav -->

  <div class="row">
    <div class="col-md-12">
      <nav class="navbar  navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#">
          <?php

          if (isset($_SESSION['usuario'])) {
            echo 'Bienvenid@ ' . $_SESSION["usuario"];
          } else {
            echo 'ArtiMax CR';
          }

          ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre nosotros</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>




  <script type="text/javascript" src="public/js/jquery.js"></script>
</body>

</html>
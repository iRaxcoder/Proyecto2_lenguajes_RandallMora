<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenid@
    <?php if (isset($_SESSION["usuario"])) {
      echo $_SESSION["usuario"];
    } ?></title>
  <link rel="stylesheet" href="public/css/header.css">
  <script type="text/javascript" src="public/js/jquery.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>

  <!-- header -->
  <div class="jumbotron text-center">

    <h1><img src="/public/img/carrito_header.png" width="100px" alt="carrito_header">Artículos ArtiMax CR
    <img src="/public/img/compras.png" width="100px" alt="carrito_header"></h1>
    <p>Venta de artículos de primera calidad. Productos nacionales e internacionales con los mejores precios.</p>
  </div>




  <script type="text/javascript" src="public/js/jquery.js"></script>
</body>

</html>
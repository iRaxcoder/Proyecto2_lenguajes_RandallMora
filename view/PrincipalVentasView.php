<?php
include_once './public/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/public/js/articulo.js"></script>
    <script src="/public/js/carrito_compra.js"></script>
</head>

<body>

</body>

</html>

<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-right  navbar-expand-lg navbar-light bg-light">
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
            <div class="collapse navbar-collapse " id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href='javascript:;' onclick="mostrar_articulos(1); return false;" class="nav-link"> Articulos <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="?controlador=User&accion=mostrar_principal_ventas" class="nav-link">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Sobre nosotros</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class=”row” style="margin: 1em; align-items: stretch; display:flex;">
    <div class="col-md-2 bg-light">
        <nav class="navbar">
            <ul class="nav navbar-nav">
                <form method="post" class=" form-inline" style="justify-content: right;">
                    <input id="nombreArticulo" class="form-control mr-sm-2" style="justify-content: right; margin-bottom: 1em; border-bottom: crimson 5px solid;" type="search" placeholder="Articulo" aria-label="Search">
                    <button onclick="buscar_por_nombre($('#nombreArticulo').val());return false;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar articulo</button>
                </form>
                <h5 style="margin-top: 1em;">Categorias</h3>
                    <?php
                    if (isset($vars['categorias'])) {
                        foreach ($vars['categorias'] as $item) {
                    ?>
                            <li class="nav-item">
                                <a data-value="<?php echo $item['nombre_categoria'] ?>" id=" <?php echo $item['nombre_categoria'] ?>" class="nav-link" href="javascript:;" onclick="buscar_por_categoria(this);return false;">
                                    <?php echo $item['nombre_categoria'] ?> </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
            </ul>
        </nav>
    </div>
    <div class=" text-center clear-fix col-md-7 ">
        <h2 class="ofrecimiento" style="border-bottom: red 5px solid; position: relative; left: 2em;">Promociones</h2>
        <div class="row articulosOF" id="rowArticulos">
            <?php
            if (isset($vars['promos'])) {
                foreach ($vars['promos'] as $item) {
            ?>
                    <div class='card col-md-1 offset-md-2' style='width: 18rem; margin-bottom: 1em;'>
                        <img class='card-img-top' height='200px' width='200' src='/public/img/<?php echo $item['nombre_imagen'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $item['nombre_articulo'] ?></h5>
                            <p class='card-text'><?php echo $item['descripcion'] ?></p>
                            <p id="precio">
                                <del>$<?php echo $item['precio_regular'] ?></del>
                                <span>$</span><?php echo $item['PRECIO_REBAJA'] ?>
                            </p>
                            <p>válido hasta el: <?php echo $item['fecha_final'] ?> </p>
                            <input id="numero" type="number" min="1" style="width: 50px;" value="1">
                            <a id="<?php echo $item['id_articulo'] ?>" href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary'>
                                <img height='25px' src='/public/img/carrito.png' alt='carrito'>
                            </a>
                            <a href='#' class='btn btn-primary'>
                                <img height='25px' src='/public/img/comprar.png' alt='comprar directo'>
                            </a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="text-center clear-fix col-md-2 offset-md-1 bg-light">
        <h2 style="border-bottom: red 5px solid;">Carrito</h2>
    </div>
</div>
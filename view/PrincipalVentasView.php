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
    <link rel="stylesheet" href="/public/css/principal.js">
</head>


<body>

</body>

</html>

<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-right navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "Bienvenid@ " . $_SESSION["usuario"];
                } else {
                    echo 'ArtiMax CR';
                }
                ?>
                <p style="display: none;" id="n_usuario"><?php echo $_SESSION["usuario"]; ?></p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navegacion" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href='javascript:;' onclick="mostrar_articulos(1); return false;" class="nav-link"> Artículos <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" onclick="mostrar_promos();" class="nav-link">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" onclick="mostrar_favoritos();" class="nav-link">Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a href="?controlador=User&accion=mostrar_historial_compras_view" class="nav-link">Historial de compras</a>
                    </li>
                    <li class="nav-item">
                        <a href="?controlador=User&accion=mostrar_metodos_pago_view" class="nav-link">Métodos de pago</a>
                    </li>

                    <li class="nav-item">
                        <a href="/index.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>
                <p style="color: red;" id="tipo_cambio"></p>
            </div>
        </nav>
    </div>
</div>


<div class='row' style="margin-top: 1em; margin-bottom: 1em;">
    <div class="col-md-2 bg-danger bg-gradient">
        <nav class="navbar">
            <ul class="nav navbar-nav">
                <h5 style="border-bottom: black 5px solid;">Ordenar por precio</h5>
                <select class="form-control" onchange="mostrar_por_precio();" name="orden" id="orden">
                    <option value="0">Ordenar por</option>
                    <option value="1">Ascendente</option>
                    <option value="2">Descendente</option>
                </select>
                <h5>Nombre</h5>
                <form method="post" class=" form-inline" style="justify-content: right;">
                    <input id="nombreArticulo" class="form-control mr-sm-2" style="justify-content: right; margin-bottom: 1em;" type="search" placeholder="Articulo" aria-label="Search">
                    <button onclick="buscar_por_nombre($('#nombreArticulo').val());return false;" class="btn btn-success my-2 my-sm-0" type="submit">Buscar articulo</button>
                </form>
                <h5 style="margin-top: 1em;">Categorías</h3>
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
    <div class=" text-center col-md-6">
        <h2 class="ofrecimiento" style="border-bottom: red 5px solid; position: relative; left: 2em;">Favoritos</h2>
        <div class="row articulosOF" id="rowArticulos">
            <?php
            if (isset($vars['favoritos'])) {
                foreach ($vars['favoritos'] as $item) {
            ?>
                    <div class='card col-md-5 offset-md-1' style='width: 18rem; margin-bottom: 1em;'>
                        <img class='card-img-top' height='200px' width='200px' src='/public/img/<?php echo $item['NOMBRE_IMAGEN'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 id="nombre_articulo" class='card-title'><?php echo $item['NOMBRE_ARTICULO'] ?></h5>
                            <p class='card-text'><?php echo $item['DESCRIPCION'] ?></p>
                            <p id="precio">Precio: $
                                <?php echo $item['PRECIO'] ?>
                            </p>
                            <a id='fav' href='javascript:;' onclick='agregar_favorito(this);'>Agregar/quitar fav</a>
                            <input id="numero" type="number" min="1" style="width: 50px;" value="1">
                            <a id='agregar_carrito' href='javascript:;' onclick='agregar_al_carrito(this);' style='margin: 1em;' class='btn btn-primary' data-id='<?php echo $item['ID_ARTICULO']  ?>' data-nombre='<?php echo $item['NOMBRE_ARTICULO']  ?>' data-precio='<?php echo $item['PRECIO']  ?>'>

                                <img height='25px' src='/public/img/carrito.png' alt='carrito'>
                            </a>
                            <a href='javascript:;' onclick='mostrar_compra_modal(this);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCompra'>
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
    <aside class="text-center clear-fix col-md-3 offset-md-1 bg-danger bg-gradient">
        <h2 style="border-bottom: black 5px solid;">Carrito</h2>
        <ul id="carritoC" class="list-group"></ul>
        <p id="total" class="text-center">Total: <span id="Total"></span>&dollar;</p>
        <button onclick="vaciar_carrito();" id="boton-vaciar" class="btn bg-warning">Vaciar</button>
        <button type="button" class="btn btn-success" onclick="mostrar_carrito_modal();">Verificar compra</button>
    </aside>
</div>

<!-- Modal -->
<div class="modal" id="modalCompra" tabindex="-1" role="dialog" aria-labelledby="modalCompra" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalCompraLabel">Verificar compra</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 style="border-bottom: red 5px solid;">Detalles de la compra</h3>
                <ul id="carritoModal" class="list-group"></ul>
                <p id="totalModal" class="text-center">Total: <span id="Total"></span>&dollar;</p>
                <h4 style="border-bottom: red 5px solid;">Selección de método de pago</h4>
                <?php
                if (isset($vars['metodos']) && $vars['metodos'] != null) {
                ?>

                    <select id="selec_metodo" name="selec_metodo" class="form-control">
                        <?php
                        foreach ($vars['metodos'] as $item) {
                        ?>

                            <option value="<?php echo $item['id_tarjeta_credito'] ?>">
                                <?php echo $item['numero_tarjeta'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="button" onclick="realizar_pago_directo($('#selec_metodo').val());" class="btn btn-primary">Realizar pago</button>
                        <button type="button" class="btn btn-secondary" class="close" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                <?php
                } else {
                ?>
                    <h5>¡Vaya! No se ha encontrado un método de pago registrado.</h5>
                    <div class="modal-footer">
                        <a href="?controlador=User&accion=mostrar_metodos_pago_view">Agregar método de pago</a>
                        <button type="button" class="btn btn-secondary" class="close" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php
include_once './public/footer.php';
?>


<script src="/public/js/articulo.js"></script>
<script src="/public/js/carrito_compra.js"></script>
<script>
    window.onload = principal();
    window.onload = cargar_tipo_cambioA();
</script>
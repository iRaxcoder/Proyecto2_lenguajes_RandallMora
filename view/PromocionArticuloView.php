<?php
include_once 'headerAdminView.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestor de promociones</title>
    <script type="text/javascript" src="public/js/articulo.js"></script>
</head>

<body>

</body>

</html>

<table class="table table-hover table-responsive">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($vars['articulos'])) {
            foreach ($vars['articulos'] as $item) {
        ?>

                <tr>
                    <th scope="row"><?php echo $item['ID_ARTICULO'] ?></th>
                    <td><?php echo $item['NOMBRE_ARTICULO'] ?></td>
                    <td><?php echo $item['PRECIO'] ?></td>
                    <td><?php echo $item['DESCRIPCION'] ?></td>
                    <td><?php echo $item['nombre_categoria'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<div class="row">

    <div class="col-md-4 offset-md-4" style="border-style: dotted; border-color: red;">

        <form action="?controlador=Articulo&accion=registrar_promocion" method="post">

            <h3>Promoción de articulos ArtiMax</h3>
            <!-- fecha inicio -->
            <div class="form-group">
                <label for="inicio">Fecha inicial</label>
                <input type="date" class="form-control" name="fecha_inicial" id="fecha_inicial" required>

            </div>
            <!-- fecha final -->
            <div class="form-group">
                <label for="final">Fecha final</label>
                <input type="date" class="form-control" name="fecha_final" id="fecha_final" required>

            </div>
            <!-- id -->
            <div class="form-group">
                <label for="id_articulo">ID Articulo: </label>
                <input type="id" class="form-control" id="id_articulo" name="id_articulo" placeholder="id articulo" required>

            </div>
            <!-- precio promo -->
            <div class="row">
                <label for="precio_nuevo">Precio nuevo: </label>
                <input type="number" class="form-control" id="precio_nuevo" name="precio_nuevo" placeholder="n%" required>

            </div>
            <!-- boton registrar -->
            <div class="row">
                <div class="col-md-12 register-row">
                    <button class="btn btn-primary">Aplicar</button>
                </div>
            </div>
        </form>
    </div>


</div>
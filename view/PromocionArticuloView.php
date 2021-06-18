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

</head>

<body>

</body>

</html>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
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

<div class="row text-center">

    <div class="col-md-12">

        <form method="post">

            <div class="row">
                <div class=" col-md-12 register-form-header">
                    <p class="register-form-font-header">Promocion de articulos <span>ArtiMax</span>
                    </p>
                </div>
            </div>
            <!-- fecha inicio -->
            <div class="row">
                <div class="col-md-12">
                    <label for="inicio">Fecha inicial</label>
                    <input type="date" name="fecha_inicial">
                </div>
            </div>
            <!-- fecha final -->
            <div class="row">
                <div class="col-md-12">
                    <label for="final">Fecha final</label>
                    <input type="date" name="fecha_final">
                </div>
            </div>
            <!-- id -->
            <div class="row">
                <div class="col-md-12">
                    <input type="id" id="id_articulo" name="id_articulo" placeholder="id articulo" required>
                </div>
            </div>
            <!-- precio promo -->
            <div class="row">
                <div class="col-md-12">
                    <input type="precio" id="precio_nuevo" name="precio_nuevo" placeholder="precio promo $" required>
                </div>
            </div>

            <!-- boton registrar -->
            <div class="row">
                <div class="col-md-12 register-row">
                    <button onclick="registrar_usuario(); return false;" class="btn btn-primary">Aplicar</button>
                </div>
            </div>
        </form>
    </div>


</div>
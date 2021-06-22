<?php
include_once 'headerAdminView.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de articulos</title>
    <script type="text/javascript" src="/public/js/admin.js"></script>
</head>

<body>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acción</th>
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
                        <td>
                            <p id="nombreImagen"><?php echo $item['NOMBRE_IMAGEN'] ?></p>
                            <img width="30px" src="/public/img/<?php echo $item['NOMBRE_IMAGEN'] ?>" alt="imagenArticulo">
                        </td>
                        <td>$<?php echo $item['PRECIO'] ?></td>
                        <td><?php echo $item['DESCRIPCION'] ?></td>
                        <td><?php echo $item['nombre_categoria'] ?></td>
                        <td>
                            <a href="javascript:;" onclick="modificar_articulo(this);return false;" class="text-primary"><img width="30px" src="/public/img/editar.png" alt=""></a> |
                            <a href="" class="text-danger"><img width="30px" src="/public/img/borrar.png" alt=""></a>
                        </td>

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <div class="row text-center" id="row_modificar" style="display: none;">

        <div class="col-md-12">

            <form action="" enctype="multipart/form-data" method="post">

                <div class="row">
                    <div class=" col-md-12 register-form-header">
                        <p class="register-form-font-header">Modificar articulo <span>ArtiMax</span>
                        </p>
                    </div>
                </div>
                <!-- nombre -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Nombre:</label>
                        <input type="nombre" id="nombreArticulo" name="nombreArticulo" placeholder="nombre de articulo" required>
                    </div>
                </div>
                <!-- precio -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Precio:</label>
                        <input type="precio" id="precio" name="precio" placeholder="precio" required>
                    </div>
                </div>
                <!-- descripcion -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Descripcion:</label>
                        <textarea name="descripcion" id="descripcion" cols="22.5" style="resize: none;" placeholder="descripcion" rows="4"></textarea>
                    </div>
                </div>
                <!-- categoria -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Categoria:</label>
                        <select name="categoria" id="categoria">
                            <option id="seleccionDefecto" value="">Seleccionar categoria</option>
                            <?php
                            if (isset($vars['categorias'])) {
                                foreach ($vars['categorias'] as $item) {
                            ?>
                                    <option value=<?php echo $item['id_categoria']; ?>><?php echo $item['nombre_categoria']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Imagen Actual:</label>
                        <input type="" id="ImagenAct" name="imagenAct" placeholder="imagen" required>
                    </div>
                </div>
                <!-- imagen -->
                <div class="row">
                    <div class="col-md-12 upload-image">
                        <input accept="image/png,image/jpeg" type="file" name="imagen" id="imagen" />
                    </div>
                </div>
        </div>
        <!-- boton registrar -->
        <div class="row">
            <div class="col-md-12 register-row">
                <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
        </form>

    </div>

    </div>

</body>

</html>
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
    <div class="row text-center">
        <div class="col-md-4 offset-md-4">
            <div class="input-group mb-3" style="border-top: darkgray 1px solid; margin-top:1em;">
                <input type="text" for="boton_filtro" id="filtro" class="form-control" placeholder="c-{categoria} ó n-{nombre} ó i-{id}" aria-label="filtro_articulo" aria-describedby="button-addon2" require>
                <div class="input-group-append">
                    <button id="boton_filtro" onclick="buscar_por_filtro($('#filtro').val()); return false;" class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover table-responsive" id="tablaArt">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio dólares</th>
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
                            <p id="nombreImagen" style="display: none;"><?php echo $item['NOMBRE_IMAGEN'] ?></p>
                            <img width="30px" src="/public/img/<?php echo $item['NOMBRE_IMAGEN'] ?>" alt="imagenArticulo">
                        </td>
                        <td><?php echo $item['PRECIO'] ?></td>
                        <td><?php echo $item['DESCRIPCION'] ?></td>
                        <td><?php echo $item['nombre_categoria'] ?></td>
                        <td>
                            <a href="javascript:;" onclick="modificar_articulo(this);return false;" class="text-primary"><img width="30px" src="/public/img/editar.png" alt="editar"></a> |
                            <a href="javascript:;" onclick="borrar_articulo(this); return false;" class="text-danger"><img width="30px" src="/public/img/borrar.png" alt="borrar"></a>
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

            <div class="form-group">
                <form action="?controlador=Admin&accion=modificar_articulo" enctype="multipart/form-data" method="post">

                    <div class="row">
                        <div class=" col-md-12 register-form-header">
                            <p class="register-form-font-header">Modificar articulo <span>ArtiMax</span>
                            </p>
                        </div>
                    </div>
                    <!-- id -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="id_articulo">ID:</label>
                            <input type="nombre" readonly class="form-control" id="id_articulo" name="id_articulo" placeholder="id articulo" required>
                        </div>
                    </div>
                    <!-- nombre -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombreArticulo">Nombre:</label>
                            <input type="nombre" class="form-control" id="nombreArticulo" name="nombreArticulo" placeholder="nombre de articulo" required>
                        </div>
                    </div>
                    <!-- precio -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Precio:</label>
                            <input type="number" step="any" min="1" class="form-control" id="precio" name="precio" placeholder="precio" required>
                        </div>
                    </div>
                    <!-- descripcion -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Descripcion:</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" cols="22.5" style="resize: none;" placeholder="descripcion" rows="4"></textarea>
                        </div>
                    </div>
                    <!-- categoria -->
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Categoria:</label>
                            <select class="form-control" name="categoria" id="categoria">
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
                            <input type="" class="form-control" id="ImagenAct" readonly name="imagenAct" placeholder="imagen" required>
                        </div>
                    </div>
                    <!-- imagen -->
                    <div class="row">
                        <div class="col-md-12 upload-image">
                            <input accept="image/png,image/jpeg" class="" type="file" name="imagen2" id="imagen2" />
                        </div>
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
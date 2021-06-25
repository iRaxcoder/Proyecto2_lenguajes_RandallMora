<?php
include_once './view/headerAdminView.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

</body>

</html>



<div class="row">

    <div class="col-md-2 offset-md-5" style="border-style: dotted; border-color: red;">

        <form action="?controlador=Articulo&accion=registrar_articulo" enctype="multipart/form-data" method="post">

            <h3>Registro de articulos ArtiMax </h3>
            <!-- nombre -->
            <div class="form-group">
                <label for="nombreArticulo" aria-describedby="nombre_Articulo">Nombre: </label>
                <input type="text" class="form-control" id="nombreArticulo" name="nombreArticulo" placeholder="nombre de articulo" required>
            </div>
            <!-- precio -->
            <div class="form-group">
                <label for="precio" aria-describedby="precioArt">Precio: </label>
                <input type="number" min="1" class="form-control" step="any" id="precio" name="precio" placeholder="precio" required>
            </div>
            <!-- descripcion -->
            <div class="form-group">
                <label for="descripcion" aria-describedby="descripcion">Descripción: </label>
                <textarea name="descripcion" id="descripcion" cols="22.5" style="resize: none;" placeholder="descripcion" rows="4"></textarea>

            </div>
            <!-- categoria -->
            <div class="form-group">
                <label for="categoria" aria-describedby="categoria">Categoria: </label>
                <select class="form-control" name="categoria" id="categoria">
                    <option value="">Seleccionar categoria</option>
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
            <!-- imagen -->
            <div class="form-group">
                <label for="imagen" aria-describedby="imagen">Imagen: </label>
                <input accept="image/png,image/jpeg" class="form-control" type="file" name="imagen" id="imagen" />
            </div>
            <!-- boton registrar -->
            <div class="form-group">
                <button class="btn btn-primary">Registrar</button>
            </div>
    </div>
    </form>

</div>

</div>
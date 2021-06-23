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



<div class="row text-center">

    <div class="col-md-12">

        <form action="?controlador=Articulo&accion=registrar_articulo" enctype="multipart/form-data" method="post">

            <div class="row">
                <div class=" col-md-12 register-form-header">
                    <p class="register-form-font-header">Registro de articulos <span>ArtiMax</span>
                    </p>
                </div>
            </div>
            <!-- nombre -->
            <div class="row">
                <div class="col-md-12">
                    <input type="nombre" id="nombreArticulo" name="nombreArticulo" placeholder="nombre de articulo" required>
                </div>
            </div>
            <!-- precio -->
            <div class="row">
                <div class="col-md-12">
                    <input type="number" min="1" step="any" id="precio" name="precio" placeholder="precio" required>
                </div>
            </div>
            <!-- descripcion -->
            <div class="row">
                <div class="col-md-12">
                    <textarea name="descripcion" id="descripcion" cols="22.5" style="resize: none;" placeholder="descripcion" rows="4"></textarea>
                </div>
            </div>
            <!-- categoria -->
            <div class="row">
                <div class="col-md-12">
                    <select name="categoria" id="categoria">
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
            <button class="btn btn-primary">Registrar</button>
        </div>
    </div>
    </form>

</div>

</div>
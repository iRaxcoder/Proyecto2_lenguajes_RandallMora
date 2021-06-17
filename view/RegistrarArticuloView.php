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

        <form method="post">

            <div class="row">
                <div class=" col-md-12 register-form-header">
                    <p class="register-form-font-header">Registro de articulos <span>ArtiMax</span>
                    </p>
                </div>
            </div>
            <!-- nombre -->
            <div class="row">
                <div class="col-md-12">
                    <input type="nombre" id="nombre" name="nombre" placeholder="nombre de articulo" required>
                </div>
            </div>
            <!-- precio -->
            <div class="row">
                <div class="col-md-12">
                    <input type="precio" id="precio" name="precio" placeholder="precio" required>
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
            <button onclick="registrar_usuario($('#usuario2').val(),2,$('#edad').val(),
                            $('#direccion').val(),$('#genero').val(),$('#contrasenniaR').val()); return false;" class="btn btn-primary">Registrar</button>
        </div>
    </div>
    </form>

</div>

</div>
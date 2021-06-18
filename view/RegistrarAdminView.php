<?php
include_once 'headerAdminView.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un administrador</title>
    <script type="text/javascript" src="public/js/user.js"></script>
</head>

<body>

</body>

</html>

<div class="row text-center">

    <div class="col-md-12">

        <form method="post">

            <div class="row">
                <div class=" col-md-12 register-form-header">
                    <p class="register-form-font-header">Registro Administrador de <span>ArtiMax</span>
                    </p>
                </div>
            </div>
            <!-- usuario -->
            <div class="row">
                <div class="col-md-12">
                    <input type="usuario" id="usuario2" name="usuario" placeholder="Nombre de usuario" required>
                </div>
            </div>
            <!-- edad -->
            <div class="row">
                <div class="col-md-12">
                    <input type="edad" id="edad" name="edad" placeholder="Edad" required>
                </div>
            </div>
            <!-- direccion -->
            <div class="row">
                <div class="col-md-12">
                    <textarea name="direccion" id="direccion" cols="22.5" style="resize: none;" placeholder="Direccion principal" rows="4"></textarea>
                </div>
            </div>
            <div class="row"></div>
            <div class="col-md-12">
                <input type="contrasennia" id="contrasenniaR" name="contrasenniaR" placeholder="Contraseña">
            </div>
            <!-- genero -->
            <div class="row">
                <div class="col-md-12">
                    <select name="genero" id="genero">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
            </div>
            <!-- boton registrar -->
            <div class="row">
                <div class="col-md-12 register-row">
                    <button onclick="registrar_usuario($('#usuario2').val(),1,$('#edad').val(),
            $('#direccion').val(),$('#genero').val(),$('#contrasenniaR').val()); return false;" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="mensaje">

</div>
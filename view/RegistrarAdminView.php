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

    <div class="col-md-4 offset-md-4" style="border-style: dotted; border-color: red;">

        <form method="post">

            <h3>Registro de administrador ArtiMax</h3>
            <!-- usuario -->
            <div class="form-group">
                <label for="usuario">Nombre de usuario:</label>
                <input type="usuario" class="form-control" id="usuario2" name="usuario" placeholder="Nombre de usuario" required>

            </div>
            <!-- edad -->
            <div class="form-group">

                <label for="edad">Edad:</label>
                <input type="edad" class="form-control" id="edad" name="edad" placeholder="Edad" required>

            </div>
            <!-- direccion -->
            <div class="form-group">
                <label for="direccion">Dirección: </label>
                <textarea class="form-control" name="direccion" id="direccion" cols="22.5" style="resize: none;" placeholder="Direccion principal" rows="4"></textarea>

            </div>
            <div class="form-group">
                <label for="contrasenniaR">Contraseña: </label>
                <input class="form-control" type="contrasennia" id="contrasenniaR" name="contrasenniaR" placeholder="Contraseña">
            </div>
            <!-- genero -->
            <div class="form-group">
                <label for="genero">Género: </label>
                <select class="form-control" name="genero" id="genero">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>

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
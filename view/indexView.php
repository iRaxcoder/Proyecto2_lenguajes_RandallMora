<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar o iniciar sesión</title>
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/user.js"></script>
</head>

<body>





    <div class="container">
        <div class="row text-center" style="border-bottom: red 5px dashed;">
            <div class="col-md-12">
                <h1>Bienvenido al inicio ArtiMax</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row login-register-page" style="margin-top: 10em;">
            <div class="col-md-5" style="border-style: solid;">
                <form action="?controlador=User&accion=iniciar_sesion" method="post">
                    <div class="row">
                        <div class="col-md-12 login-form-header" style="border-bottom: red 5px solid;">
                            <b class="login-form-font-header">Iniciar sesión <span></span>
                            </b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 login-row" style="margin-top: 1em;">
                            <input name="usuario" id="usuario" type="usuario" placeholder="Usuario" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 login-row" style="margin-top: 1em;">
                            <input name="contrasennia" id="contrasennia" type="contrasennia" placeholder="Contraseña" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 login-row" style="margin-top: 1em;">
                            <button type="summit" class="btn btn-primary">Entrar</button>
                        </div>
                        <div class="col-md-6 text-center">
                        <img src="/public/img/login.png" height="50px" width="50px" alt="login">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 offset-sm-1" style="border-style: solid;">

                <form method="post">

                    <div class="row">
                        <div class=" col-md-12 register-form-header" style="border-bottom: red 5px solid;">
                            <b class="register-form-font-header">Registrarse<span></span>
                            </b>
                        </div>
                    </div>
                    <!-- usuario -->
                    <div class="row" style="margin-top: 1em;">
                        <div class=" col-md-4">
                            <input type="usuario" id="usuario2" name="usuario" placeholder="Nombre de usuario" required>
                        </div>
                        <!-- edad -->
                        <div class="col-md-3">
                            <input type="edad" id="edad" name="edad" placeholder="Edad" required>
                        </div>
                    </div>
                    <!-- direccion -->
                    <div class="row">
                        <div class="col-md-3 offset-md-2" style="margin-top: 1em;">
                            <textarea name="direccion" id="direccion" cols="20.5" style="resize: none;" placeholder="Direccion principal" rows="3"></textarea>
                        </div>
                        <div class="col-md-3 text-center offset-md-4">
                        <img src="/public/img/register.png" height="70px" width="70px" alt="login">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="contrasennia" id="contrasenniaR" name="contrasenniaR" placeholder="Contraseña">
                        </div>

                        <!-- genero -->

                        <div class="col-md-3">
                            <select name="genero" id="genero" style="width: 12em;">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <!-- boton registrar -->
                    <div class="row">
                        <div class="col-md-12 offset-md-3 register-row" style="margin-top: 1em; margin-bottom: 1em;">
                            <button onclick="registrar_usuario($('#usuario2').val(),2,$('#edad').val(),
                            $('#direccion').val(),$('#genero').val(),$('#contrasenniaR').val()); return false;" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mensaje">

    </div>

</body>

</html>
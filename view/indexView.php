
<!-- <?php
// session_start();
// if (isset($_post['usuario'])){
// $_SESSION['admin']=$_post['usuario'];
// }
?> -->


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
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Bienvenido a la gestión de usuarios ArtiMax</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row login-register-page">
            <div class="col-md-6">
                <form action="?controlador=User&accion=iniciar_sesion" method="post">
                    <div class="row">
                        <div class="col-md-12 login-form-header">
                            <p class="login-form-font-header">Login <span>ArtiMaxCR</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-row">
                            <input name="usuario" id="usuario" type="usuario" placeholder="Usuario" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-row">
                            <input name="contrasennia" id="contrasennia" type="contrasennia" placeholder="Contraseña" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-row">
                            <button class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">

                <form method="post">

                    <div class="row">
                        <div class=" col-md-12 register-form-header">
                            <p class="register-form-font-header">Registro<span>ArtiMax</span>
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
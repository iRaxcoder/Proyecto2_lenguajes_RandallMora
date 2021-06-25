<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/articulo.js"></script>
</head>

<body>

    <div class=" row text-center jumbotron">
        <h1>Bienvenido al módulo administrativo</h1>
        <p>Venta de articulos de primera calidad. Productos nacionales e internacionales con los mejores precios y promociones</p>
    </div>

    <!-- nav -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#">ArtiMax CR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?controlador=Admin&accion=mostrar_registro_articulo_view">Registrar articulo <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=Admin&accion=mostrar_gestion_articulos_view">Gestión de articulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=Admin&accion=mostrar_promociones_view">Gestión de promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=Admin&accion=mostrar_gestion_usuario_admin">Gestion usuario admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Cerrar sesión</a>
                </li>
            </ul>
            </form>
        </div>
    </nav>
</body>

</html>
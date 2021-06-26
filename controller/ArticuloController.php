<?php


class ArticuloController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function registrar_articulo()
    {
        $carpetaDestino = "./public/img/";
        if (isset($_FILES["imagen"])) {
            if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                $origen = $_FILES["imagen"]["tmp_name"];
                $destino = $carpetaDestino . $_FILES["imagen"]["name"];

                if (@move_uploaded_file($origen, $destino)) {
                    //echo "<br>" . $_FILES["imagen"]["name"] . " movido correctamente";
                } else {
                    // echo "<br>No se ha podido mover el archivo: " . $_FILES["imagen"]["name"];
                }
            } else {
                echo "<br>No existe el directorio";
            }
        }
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();

        $respuesta = $articulo->registrar_articulo(
            $_POST['nombreArticulo'],
            $_POST['precio'],
            $_POST['descripcion'],
            $_POST['categoria'],
            $_FILES['imagen']['name']
        );

        if ($respuesta == 0) {
            echo '<script> alert("No se ha podido registrar el articulo.")</script>';
        } else if ($respuesta == 1) {
            echo '<script> alert("Articulo registrado con éxito.")</script>';
        }
        $this->view->show("headerAdminView.php", null);
    }

    public function registrar_promocion()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();

        $respuesta = $articulo->registrar_promocion(
            $_POST['fecha_inicial'],
            $_POST['fecha_final'],
            $_POST['id_articulo'],
            $_POST['precio_nuevo']
        );

        if ($respuesta == 1) {
            echo '<script> alert("Articulo registrado con éxito.")</script>';
            $data['articulos'] = $articulo->obtener_articulos();
            $this->view->show("PromocionArticuloView.php", $data);
        }
    }

    public function obtener_articulos()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();

        $data['articulos'] = $articulo->obtener_articulos_bd();

        echo json_encode($data);
    }

    public function obtener_articulos_nombre()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $data['articulos'] = $articulo->obtener_articulos_nombre($_POST['nombre']);
        $data['promos'] = $articulo->obtener_promos_nombre($_POST['nombre']);
        echo json_encode($data);
    }

    public function obtener_promos()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado['promos'] = $articulo->obtener_promociones();
        echo json_encode($resultado);
    }


    public function obtener_articulos_categoria()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $data['articulos'] = $articulo->obtener_articulos_categoria($_POST['categoria']);
        $data['promos'] = $articulo->obtener_promos_categoria($_POST['categoria']);
        echo json_encode($data);
    }

    public function agregar_al_carrito()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado = $articulo->agregar_al_carrito($_POST['nombre_usuario'], $_POST['id_articulo'], $_POST['cantidad']);
        echo ("listo");
    }
    public function quitar_del_carrito()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado = $articulo->quitar_del_carrito($_POST['nombre_usuario'], $_POST['id_articulo']);
        echo ("listo");
    }
    public function vaciar_carrito()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado = $articulo->vaciar_carrito($_POST['nombre_usuario']);
        echo ("listo");
    }

    public function mostrar_carrito()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado['carrito'] = $articulo->obtener_carrito($_POST['nombre_usuario']);
        echo json_encode($resultado);
    }

    public function agregar_favorito()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado = $articulo->agregar_favorito($_POST['nombre_usuario'], $_POST['n_articulo']);
        echo $_POST['nombre_usuario'] . $_POST['n_articulo'];
    }

    public function mostrar_favoritos()
    {
        require_once './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $resultado['favoritos'] = $articulo->mostrar_favoritos($_POST['usuario']);
        echo json_encode($resultado);
    }
}

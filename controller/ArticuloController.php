<?php

class ArticuloController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function registrar_articulo()
    {
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

        echo $respuesta;
    }
}

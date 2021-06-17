<?php

class ArticuloController{
    public function __construct()
    {
        $this->view=new View();
    }

    public function registrar_articulo(){
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();

        $respuesta=$articulo->registrar_articulo(
            $_POST['nombreArticulo'],
            $_POST['precio'],
            $_POST['descripcion'],
            $_POST['categoria'],
            $_FILES['imagen']['name']
        );

        

    }

    
}
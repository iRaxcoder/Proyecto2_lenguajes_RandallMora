<?php

class AdminController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function mostrar_registro_articulo()
    {
        require './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['categorias'] = $items->mostrar_categorias();
        $this->view->show("RegistrarArticuloView.php", $data);
    }

    public function mostrar_principal(){
        $this->view->show("headerAdmin.php", null);
    }
}

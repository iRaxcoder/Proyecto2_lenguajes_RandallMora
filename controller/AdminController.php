<?php

class AdminController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function mostrar_registro_articulo_view()
    {
        require './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['categorias'] = $items->mostrar_categorias();
        $this->view->show("RegistrarArticuloView.php", $data);
    }

    public function mostrar_principal()
    {
        $this->view->show("headerAdminView.php", null);
    }

    public function mostrar_promociones_view()
    {
        require './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['articulos'] = $items->obtener_articulos();

        $this->view->show("PromocionArticuloView.php", $data);
    }

    public function mostrar_gestion_usuario_admin()
    {
        $this->view->show("RegistrarAdminView.php", null);
    }
}

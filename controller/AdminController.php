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


    public function mostrar_informes_ventas_view()
    {
        require './model/VentaModel.php';
        $ventas = new VentaModel();
        $data['ventas'] = $ventas->mostrar_ventas();
        $this->view->show("InformeVentasView.php", $data);
    }

    public function mostrar_gestion_articulos_view()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['articulos'] = $items->obtener_articulos();
        $data['categorias'] = $items->mostrar_categorias();
        $this->view->show("GestionArticulosView.php", $data);
    }

    public function modificar_articulo()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();

        if (isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] != 4) {
            $items->modificar_articulo($_POST['nombreArticulo'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $_FILES['imagen2']['name'], $_POST['id_articulo']);
        } else {
            $items->modificar_articulo($_POST['nombreArticulo'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $_POST['imagenAct'], $_POST['id_articulo']);
        }
        $this->mostrar_gestion_articulos_view();
    }

    public function borrar_articulo()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $items->borrar_articulo($_POST['id']);
        $data['articulos'] = $items->obtener_articulos();
        echo json_encode($data);
    }

    public function obtener_articulo_por_nombre()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['resultado'] = $items->obtener_articulos_nombre($_POST['tipo']);
        echo json_encode($data);
    }
    public function obtener_articulo_por_id()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['resultado'] = $items->obtener_articulos_id($_POST['tipo']);
        echo json_encode($data);
    }
    public function obtener_articulo_por_categoria()
    {
        require_once './model/ArticuloModel.php';
        $items = new ArticuloModel();
        $data['resultado'] = $items->obtener_articulos_categoria($_POST['tipo']);
        echo json_encode($data);
    }

    public function obtener_ventas_rango()
    {
        require './model/VentaModel.php';
        $ventas = new VentaModel();
        $data['ventas'] = $ventas->mostrar_ventas_rango($_POST['desde'], $_POST['hasta']);
        echo json_encode($data);
    }

    public function obtener_ventas_mes_annio(){
        require './model/VentaModel.php';
        $ventas = new VentaModel();
        $data['ventas']=$ventas->mostrar_ventas_mes_annio($_POST['mes'],$_POST['annio']);
        echo json_encode($data);
    }
}

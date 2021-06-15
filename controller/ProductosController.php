<?php

class ProductosController {

//    private $view;

    public function __construct() {
        $this->view = new View();
    }// constructor

    public function listar() {
        require 'model/ProductosModel.php';
        $items = new ItemsModel();
        $data['listado'] = $items->listar();

        $this->view->show("listarproductosView.php", $data);
    }// listar
    
    public function mostarregistrar(){
        $this->view->show("registrarProductoView.php", null);
    }
    
    public function mostarproductos(){
        require 'model/ItemsModel.php';
        $items=new ItemsModel();
        $data['listado']=$items->listar();
         
        $this->view->show("listarView.php", $data);
    }

    public function mostarregistrarajax(){
        $this->view->show("registrarProductoAjaxView.php", null);
    }

    public function registrar(){
        require 'model/ProductosModel.php';
        $productoM=new ProductosModel();
        $productoM->registrar($_POST['nombre']);
        $data = array("todo bien");
        $this->view->show("registrarProductoView.php", $data);
    }// registrarproducto

    public function registrarajax(){
        require 'model/ProductosModel.php';
        $productoM=new ProductosModel();
        $productoM->registrar($_POST['nombre']);
        echo 'Producto registrado';
    }
    
}// fin clase

?>


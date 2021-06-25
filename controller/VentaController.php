<?php
session_start();



class VentaController
{
    public function __construct()
    {
        $this->view = new View();
    }



    public function registrar_venta()
    {
        require_once './model/VentaModel.php';
        $venta = new VentaModel();
        $resultado = $venta->registrar_venta($_POST['total']);
        echo  $resultado;
    }

    public function registrar_compra_articulo()
    {
        require_once './model/VentaModel.php';
        $venta = new VentaModel();
        $resultado = $venta->registrar_compra_articulo(
            $_POST['id_articulo'],
            $_POST['id_venta'],
            $_SESSION['usuario'],
            $_POST['id_tarjeta'],
            $_POST['cantidad'],
            $_POST['subtotal']
        );
        echo $resultado;
    }
}

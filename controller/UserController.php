<?php

session_start();

class UserController
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function iniciar_sesion()
    {
        $_SESSION['usuario'] = $_POST['usuario'];
        require './model/UserModel.php';
        $user = new UserModel();
        $respuesta = $user->iniciar_sesion($_POST['usuario'], $_POST['contrasennia']);

        switch ($respuesta) {
            case 0:
                echo '<script> alert("El usuario no existe")</script>';
                break;
            case 1:
                $this->view->show("headerAdminView.php", null);
                break;
            case 2:
                $this->mostrar_principal_ventas();
                break;
        }
    }

    public function mostrar_principal_ventas()
    {
        require './model/ArticuloModel.php';
        $articulo = new ArticuloModel();
        $data['categorias'] = $articulo->mostrar_categorias();
        $data['promos'] = $articulo->obtener_promociones();
        $this->view->show("PrincipalVentasView.php", $data);
    }

    public function registrar_usuario()
    {
        require './model/UserModel.php';
        $user = new UserModel();
        $respuesta = $user->registrar_usuario($_POST['usuario2'], $_POST['edad'], $_POST['direccion'], $_POST['genero'], $_POST['contrasennia2'], $_POST['role']);
        if ($respuesta == 0) {
            echo "0";
        } else if ($respuesta == 1) {
            echo "1";
        }
    }

    public function mostrar_metodos_pago_view()
    {
        $this->view->show('MetodoPagoView.php', null);
    }
}

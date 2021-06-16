<?php


class UserController
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function iniciar_sesion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['usuario']) && isset($_POST['contrasennia'])) {
                require 'model/UserModel.php';
                $usuario = new UserModel();
                $data = $usuario->iniciar_sesion($_POST['usuario'], $_POST['contrasennia']);
                header("HTTP/1.1 200 OK");
                echo json_encode($data);
                exit();
            }
        }
    }

    public function registrar_usuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (
                isset($_POST['usuario']) && isset($_POST['edad']) && isset($_POST['direccion']) && isset($_POST['genero'])
                && isset($_POST['contrasennia'])
            ) {
                require 'model/UserModel.php';
                $usuario = new UserModel();
                $data = $usuario->registrar_usuario(
                    $_POST['usuario'],
                    $_POST['edad'],
                    $_POST['direccion'],
                    $_POST['genero'],
                    $_POST['contrasennia']
                );
                header("HTTP/1.1 200 OK");
                echo json_encode($data);
                exit();
            }
        }
    }
}

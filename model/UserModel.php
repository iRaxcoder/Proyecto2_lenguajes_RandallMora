<?php

class UserModel
{
    protected $db;


    public function __construct()
    {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function iniciar_sesion($usuario, $contrasennia)
    {
        require_once 'HTTPOP.php';
        $data_array = array(
            'usuario' => $usuario,
            'contrasennia' => $contrasennia
        );

        return HTTPOP::METODO_POST($data_array);
    }

    public function registrar_usuario($usuario, $edad, $direccion, $genero, $contrasennia, $role)
    {
        require_once 'HTTPOP.php';
        $data_array = array(
            'usuario2' => $usuario,
            'edad' => $edad,
            'direccion' => $direccion,
            'genero' => $genero,
            'contrasennia2' => $contrasennia,
            'role' => $role
        );

        return HTTPOP::METODO_POST($data_array);
    }
}

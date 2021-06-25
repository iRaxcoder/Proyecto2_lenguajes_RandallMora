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

    public function mostrar_metodos_pago($usuario)
    {
        $consulta = $this->db->prepare('call sp_mostrar_tarjeta(:p_usuario)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function registrar_metodo_pago($numero, $fecha, $cvv, $usuario, $propietario)
    {
        $consulta = $this->db->prepare('call sp_insertar_tarjeta(:p_numero,:p_fecha,:p_cvv,:p_usuario,:p_propietario)');
        $consulta->bindParam(':p_numero', $numero);
        $consulta->bindParam(':p_fecha', $fecha);
        $consulta->bindParam(':p_cvv', $cvv);
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->bindParam(':p_propietario', $propietario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function borrar_metodo_pago($usuario, $id_metodo)
    {
        $consulta = $this->db->prepare('call sp_quitar_tarjeta(:p_usuario,:p_id_tarjeta)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->bindParam(':p_id_tarjeta', $id_metodo);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}

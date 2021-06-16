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

        $consulta = $this->db->prepare('call sp_iniciar_sesion(:usuario,:contrasennia,@salida)');
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':contrasennia', $contrasennia);
        $consulta->execute();
        $consulta->closeCursor();
        $resultado = $this->db->query("select @salida")->fetch(PDO::FETCH_ASSOC);
        return $resultado['@salida'];
    }

    public function registrar_usuario($usuario,$edad,$direccion,$genero,$contrasennia){
        $consulta = $this->db->prepare('call sp_registrar_usuario(:param_usuario,:param_edad,:param_direccion,:param_genero,:param_contrasennia,@salida)');
        $consulta->bindParam(':param_usuario', $usuario);
        $consulta->bindParam(':param_edad', $edad);
        $consulta->bindParam(':param_direccion', $direccion);
        $consulta->bindParam(':param_genero', $genero);
        $consulta->bindParam(':param_contrasennia', $contrasennia);
        $consulta->execute();
        $consulta->closeCursor();
        $resultado = $this->db->query("select @salida")->fetch(PDO::FETCH_ASSOC);
        echo 'ajja';
        return $resultado['@salida'];
    }
}

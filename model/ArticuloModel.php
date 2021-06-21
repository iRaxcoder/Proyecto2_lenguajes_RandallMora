<?php

class ArticuloModel
{
    protected $db;
    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function mostrar_categorias()
    {
        require_once './model/HTTPOP.php';
        return HTTPOP::METODO_GET_PERS('categorias');
    }

    public function registrar_articulo($nombre, $precio, $descripcion, $categoria, $imagen)
    {
        require_once './model/HTTPOP.php';
        $dataArray = array(
            "nombreArticulo" => $nombre,
            "precio" => $precio,
            "descripcion" => $descripcion,
            "categoria" => $categoria,
            "imagen" => $imagen
        );
        return HTTPOP::METODO_POST($dataArray);
    }

    public function obtener_articulos()
    {
        require_once './model/HTTPOP.php';
        return HTTPOP::METODO_GET_PERS('articulos');
    }

    public function registrar_promocion($fecha_inicial, $fecha_final, $id_articulo, $precio_nuevo)
    {
        require_once './model/HTTPOP.php';
        $dataArray = array(
            "fecha_inicial" => $fecha_inicial,
            "fecha_final" => $fecha_final,
            "id_articulo" => $id_articulo,
            "precio_nuevo" => $precio_nuevo,
        );
        return HTTPOP::METODO_POST($dataArray);
    }

    public function obtener_promociones()
    {
        $consulta = $this->db->prepare('call sp_mostrar_promos()');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtener_articulos_bd()
    {
        $consulta = $this->db->prepare('call sp_mostrar_articulos()');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtener_articulos_nombre($nombre)
    {
        $consulta = $this->db->prepare('call sp_mostrar_articulo_nombre(:nombre)');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function obtener_promos_nombre($nombre)
    {
        $consulta = $this->db->prepare('call sp_mostrar_promos_nombre(:nombre)');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function obtener_articulos_categoria($categoria)
    {
        $consulta = $this->db->prepare('call sp_mostrar_articulos_categoria(:categoria)');
        $consulta->bindParam(':categoria', $categoria);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function obtener_promos_categoria($categoria)
    {
        $consulta = $this->db->prepare('call sp_mostrar_promos_categoria(:categoria)');
        $consulta->bindParam(':categoria', $categoria);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}

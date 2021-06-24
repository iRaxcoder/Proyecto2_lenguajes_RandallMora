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

    public function modificar_articulo($nombre_articulo, $precio, $descripcion, $categoria, $nombre_imagen, $id)
    {
        $consulta = $this->db->prepare('call sp_modificar_articulo(:p_nombre,:p_precio,:p_descripcion'
            . ',:p_categoria,:p_imagen,:p_id)');

        $consulta->bindParam(':p_nombre', $nombre_articulo);
        $consulta->bindParam(':p_precio', $precio);
        $consulta->bindParam(':p_descripcion', $descripcion);
        $consulta->bindParam(':p_categoria', $categoria);
        $consulta->bindParam(':p_imagen', $nombre_imagen);
        $consulta->bindParam(':p_id', $id);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function borrar_articulo($id)
    {
        $consulta = $this->db->prepare('call sp_borrar_articulo(:id)');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtener_articulos_id($id)
    {
        $consulta = $this->db->prepare('call sp_mostrar_articulos_id(:id)');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function agregar_al_carrito($usuario, $id_articulo, $cantidad)
    {
        $consulta = $this->db->prepare('call sp_agregar_carrito(:p_id_articulo,:p_usuario,:p_cantidad)');
        $consulta->bindParam(':p_id_articulo', $id_articulo);
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->bindParam(':p_cantidad', $cantidad);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function quitar_del_carrito($usuario, $id_articulo)
    {
        $consulta = $this->db->prepare('call sp_quitar_carrito(:p_id_articulo,:p_usuario)');
        $consulta->bindParam(':p_id_articulo', $id_articulo);
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function vaciar_carrito($usuario)
    {
        $consulta = $this->db->prepare('call sp_vaciar_carrito(:p_usuario)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtener_carrito($usuario)
    {
        $consulta = $this->db->prepare('call sp_mostrar_carrito(:p_usuario)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function agregar_favorito($usuario, $articulo)
    {
        $consulta = $this->db->prepare('call sp_agregar_favorito(:p_usuario,:p_articulo)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->bindParam(':p_articulo', $articulo);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function mostrar_favoritos($usuario)
    {
        $consulta = $this->db->prepare('call sp_mostrar_favoritos(:p_usuario)');
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}

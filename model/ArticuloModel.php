<?php

class ArticuloModel
{
    public function __construct()
    {
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
}

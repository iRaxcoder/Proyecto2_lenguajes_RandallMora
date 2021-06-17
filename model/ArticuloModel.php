<?php

class ArticuloModel
{
    public function __construct()
    {
        require './model/HTTPOP.php';
    }

    public function mostrar_categorias()
    {
        return HTTPOP::METODO_GET();
    }

    public function registrar_articulo($nombre, $precio, $descripcion, $categoria, $imagen)
    {
        $dataArray = array(
            "nombreProducto" => $nombre,
            "precio" => $precio,
            "descripcion" => $descripcion,
            "categoria" => $categoria,
            "imagen" => $imagen
        );
        return HTTPOP::METODO_POST($dataArray);
    }
}

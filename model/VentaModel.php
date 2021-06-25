<?php

class VentaModel
{
    protected $db;

    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrar_venta($total)
    {
        $consulta = $this->db->prepare('call sp_registrar_venta(:p_total,@id_venta)');
        $consulta->bindParam(':p_total', $total);
        $consulta->execute();
        $consulta->closeCursor();
        $resultado = $this->db->query("select @id_venta")->fetch(PDO::FETCH_ASSOC);
        return $resultado['@id_venta'];
    }

    public function registrar_compra_articulo($id_articulo, $id_venta, $usuario, $id_tarjeta, $cantidad, $subtotal)
    {
        $consulta = $this->db->prepare('call sp_insertar_venta_usuario(:p_id_articulo,:p_id_venta,:p_usuario,:p_id_tarjeta,:p_cantidad,:p_subtotal)');
        $consulta->bindParam(':p_id_articulo', $id_articulo);
        $consulta->bindParam(':p_id_venta', $id_venta);
        $consulta->bindParam(':p_usuario', $usuario);
        $consulta->bindParam(':p_id_tarjeta', $id_tarjeta);
        $consulta->bindParam(':p_cantidad', $cantidad);
        $consulta->bindParam(':p_subtotal', $subtotal);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}

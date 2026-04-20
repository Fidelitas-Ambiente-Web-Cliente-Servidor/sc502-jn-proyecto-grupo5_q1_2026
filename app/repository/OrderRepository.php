<?php
require_once __DIR__ . '/../config/conexion.php';

class OrderRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new BaseDatos();
    }

    public function crearPedido($id_usuario, $total, $direccion, $items)
    {
        $con = $this->db->getConexion();
        $con->begin_transaction();

        try {

            $sqlPedido = "INSERT INTO PEDIDOS (id_usuario, total, direccion, fecha) VALUES (?, ?, ?, NOW())";
            $stmt = $con->prepare($sqlPedido);
            $stmt->bind_param("ids", $id_usuario, $total, $direccion);
            $stmt->execute();
            $idPedido = $con->insert_id;


            $sqlDetalle = "INSERT INTO DETALLES_PEDIDO (id_pedido, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
            $stmtDetalle = $con->prepare($sqlDetalle);

            foreach ($items as $id_prod => $item) {
                $stmtDetalle->bind_param("iiid", $idPedido, $id_prod, $item['cantidad'], $item['precio']);
                $stmtDetalle->execute();
            }

            $con->commit();
            return $idPedido;
        } catch (Exception $e) {
            $con->rollback();
            return false;
        }
    }
}

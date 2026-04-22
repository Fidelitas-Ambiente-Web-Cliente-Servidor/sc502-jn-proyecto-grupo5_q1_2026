<?php
require_once __DIR__ . '/../config/conexion.php';

class OrderRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new BaseDatos();
    }

    public function crearPedido($id_usuario, $total, $direccion, $metodo_pago, $datosFacturacion, $items)
    {
        $con = $this->db->getConexion();
        $con->begin_transaction();

        try {
            $sqlPedido = "INSERT INTO PEDIDOS (id_usuario, total, direccion, metodo_pago, fecha) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $con->prepare($sqlPedido);
            $stmt->bind_param("idss", $id_usuario, $total, $direccion, $metodo_pago);
            $stmt->execute();
            $idPedido = $con->insert_id;

            $sqlFacturacion = "INSERT INTO FACTURACION (id_pedido, nombre_completo, email, provincia, direccion_exacta, detalles_pago) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtFact = $con->prepare($sqlFacturacion);
            $stmtFact->bind_param("isssss", $idPedido, $datosFacturacion['nombre'], $datosFacturacion['email'], $datosFacturacion['provincia'], $datosFacturacion['direccion_exacta'], $datosFacturacion['detalles_pago']);
            $stmtFact->execute();

            $sqlDetalle = "INSERT INTO DETALLES_PEDIDO (id_pedido, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
            $stmtDetalle = $con->prepare($sqlDetalle);

            foreach ($items as $item) {
                $id_p = $item['id_producto'];
                $cant = $item['cantidad'];
                $prec = $item['precio'];
                $stmtDetalle->bind_param("iiid", $idPedido, $id_p, $cant, $prec);
                $stmtDetalle->execute();
            }

            $con->commit();
            return $idPedido;
        } catch (Exception $e) {
            $con->rollback();
            return false;
        }
    }

    public function getAllOrders() {
        $con = $this->db->getConexion();
        $stmt = $con->prepare('CALL sp_obtener_pedidos_admin()');
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateOrderStatus($idPedido, $estado) {
        $con = $this->db->getConexion();
        $stmt = $con->prepare('CALL sp_actualizar_estado_pedido(?, ?)');
        $stmt->bind_param('is', $idPedido, $estado);
        return $stmt->execute();
    }
}

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
        $sql = "SELECT p.id_pedido, CONCAT(u.nombre, ' ', u.apellidos) as cliente, p.fecha, p.total, p.estado 
                FROM PEDIDOS p 
                LEFT JOIN USUARIOS u ON p.id_usuario = u.id_usuario 
                ORDER BY p.fecha DESC";
        $result = $con->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateOrderStatus($idPedido, $estado) {
        $con = $this->db->getConexion();
        $sql = "UPDATE PEDIDOS SET estado = ? WHERE id_pedido = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('si', $estado, $idPedido);
        return $stmt->execute();
    }

    public function getTotalVentas() {
        $con = $this->db->getConexion();
        $sql = "SELECT SUM(total) as total FROM PEDIDOS WHERE estado != 'cancelado'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function getCountPedidos() {
        $con = $this->db->getConexion();
        $sql = "SELECT COUNT(*) as total FROM PEDIDOS";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function getRecentOrders($limit = 5) {
        $con = $this->db->getConexion();
        $sql = "SELECT p.id_pedido, CONCAT(u.nombre, ' ', u.apellidos) as cliente, p.fecha, p.total, p.estado 
                FROM PEDIDOS p 
                LEFT JOIN USUARIOS u ON p.id_usuario = u.id_usuario 
                ORDER BY p.fecha DESC LIMIT ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

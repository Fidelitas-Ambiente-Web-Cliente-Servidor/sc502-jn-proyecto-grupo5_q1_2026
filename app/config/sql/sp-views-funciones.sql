
CREATE OR REPLACE VIEW VISTA_PRODUCTOS_VARIANTES AS
SELECT v.id_variante,
v.id_producto,
v.stock,
c.color,
t.talla
FROM VARIANTES AS v
JOIN COLORES as c ON c.id_color = v.id_color
JOIN TALLAS as t ON t.id_talla = v.id_talla
ORDER BY v.id_producto ASC, v.id_variante ASC;

/* ----------------------------------------------------

--------------------------------------------------------- */

DROP PROCEDURE IF EXISTS sp_obtener_producto_id;
DELIMITER //
CREATE PROCEDURE sp_obtener_producto_id(IN p_id INT)
BEGIN
    SELECT p.*,
    c.nombre AS nombre_categoria
    FROM PRODUCTOS AS p
    JOIN CATEGORIAS as c ON c.id_categoria = p.id_categoria
    WHERE id_producto = p_id;
END //
DELIMITER ;

/* ----------------------------------------------------

--------------------------------------------------------- */
DROP PROCEDURE IF EXISTS sp_insertar_producto;
DELIMITER //
CREATE PROCEDURE sp_insertar_producto(
    IN p_id_categoria INT,
    IN p_nombre_producto VARCHAR(150),
    IN p_descripcion VARCHAR(255),
    IN p_url_imagen VARCHAR(255),
    IN p_precio_unitario DECIMAL(10,2)
)
BEGIN
    INSERT INTO PRODUCTOS (id_categoria, nombre_producto, descripcion, url_imagen, precio_unitario)
    VALUES (p_id_categoria, p_nombre_producto, p_descripcion, p_url_imagen, p_precio_unitario);
END //
DELIMITER ;

/* ----------------------------------------------------

--------------------------------------------------------- */
DROP PROCEDURE IF EXISTS sp_insertar_variante;
DELIMITER //
CREATE PROCEDURE sp_insertar_variante(
    IN p_id_producto INT,
    IN p_id_color INT,
    IN p_id_talla INT,
    IN p_stock INT
)
BEGIN
    INSERT INTO VARIANTES (id_producto, id_color, id_talla, stock)
    VALUES (p_id_producto, p_id_color, p_id_talla, p_stock);
END //
DELIMITER ;


/* ----------------------------------------------------

--------------------------------------------------------- */
DROP PROCEDURE IF EXISTS sp_obtener_Datos_Producto_Id;
DELIMITER //
CREATE PROCEDURE sp_obtener_Datos_Producto_Id (IN p_id INT)
BEGIN
	SELECT v.id_variante,
    v.stock,
    c.color,
    t.talla
    FROM VARIANTES AS v
    JOIN TALLAS AS t ON t.id_talla = v.id_talla
    JOIN COLORES AS c ON c.id_color = v.id_color
    WHERE id_producto = p_id;
END //
DELIMITER ;

/* ----------------------------------------------------

--------------------------------------------------------- */
DROP PROCEDURE IF EXISTS sp_obtener_pedidos_admin;
DELIMITER //
CREATE PROCEDURE sp_obtener_pedidos_admin()
BEGIN
    SELECT p.id_pedido,
           CONCAT(u.nombre, ' ', u.apellidos) AS cliente,
           u.email,
           p.total,
           p.estado,
           p.metodo_pago,
           p.direccion,
           p.fecha
    FROM PEDIDOS AS p
    LEFT JOIN USUARIOS AS u ON u.id_usuario = p.id_usuario
    ORDER BY p.fecha DESC;
END //
DELIMITER ;

/* ----------------------------------------------------

--------------------------------------------------------- */
DROP PROCEDURE IF EXISTS sp_actualizar_estado_pedido;
DELIMITER //
CREATE PROCEDURE sp_actualizar_estado_pedido(
    IN p_id_pedido INT,
    IN p_estado VARCHAR(50)
)
BEGIN
    UPDATE PEDIDOS SET estado = p_estado WHERE id_pedido = p_id_pedido;
END //
DELIMITER ;


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
    VALUES (p_id_producto, p_id_color, p_id_talla, p_stock)
    ON DUPLICATE KEY UPDATE stock = stock + p_stock;
END //
DELIMITER ;

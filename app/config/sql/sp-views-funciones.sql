
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

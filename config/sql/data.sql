-- 1. Insertar Categorías básicas
INSERT INTO CATEGORIAS (nombre_categoria, descripcion_categoria, estado) 
VALUES ('Calzado', 'Calzado deportivo para alto rendimiento', 1),
       ('Ropa', 'Prendas deportivas para hombres, mujeres y niños', 1);

-- 2. Insertar los productos de tu ejemplo (asumiendo id_categoria 1 para calzado y 2 para ropa)
INSERT INTO PRODUCTOS (id_categoria, nombre_producto, descripcion_producto, precio, talla, color, imagen, stock_disponible, estado)
VALUES 
(1, 'Zapatillas Running Pro Max', 'Zapatillas ideales para correr largas distancias', 38250, 'M', 'Varios', '/public/static/img/productos/zapatillas-running.jpg', 50, 1),
(2, 'Camiseta Deportiva Premium', 'Tela transpirable de alta calidad', 12000, 'L', 'Azul', '/public/static/img/productos/camiseta-deportiva.jpg', 100, 1),
(2, 'Leggings Yoga Fit', 'Máxima elasticidad y confort', 14400, 'S', 'Negro', '/public/static/img/productos/leggings-yoga.jpg', 75, 1),
(2, 'Conjunto Infantil Deportivo', 'Ideal para actividades escolares y recreativas', 12000, 'S', 'Varios', '/public/static/img/productos/conjunto-infantil.jpg', 30, 1);
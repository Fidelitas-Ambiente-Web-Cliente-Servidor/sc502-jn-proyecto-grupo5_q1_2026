-- TABLA CATEGORIAS
INSERT INTO CATEGORIAS (nombre, descripcion) values ("hombre", "Ropa y equipamiento deportivo para hombres");
INSERT INTO CATEGORIAS (nombre, descripcion) values ("mujer", "	Ropa y equipamiento deportivo para mujeres");
INSERT INTO CATEGORIAS (nombre, descripcion) values ("infantil", "Ropa y equipamiento deportivo para niños");
INSERT INTO CATEGORIAS (nombre, descripcion) values ("accesorios", "Accesorios deportivos");
INSERT INTO CATEGORIAS (nombre, descripcion) values ("Sin categoria", "Sin categoria definida");
INSERT INTO CATEGORIAS (nombre, descripcion) values ("zapatillas", "zapatillas deportivas");

-- TABLA PRODUCTOS
INSERT INTO PRODUCTOS (id_categoria, nombre_producto, descripcion, precio_unitario,url_imagen) 
values 
(6, "Zapatillas Running Pro Max", "Zapatillas ideales para correr largas distancias",38250,"https://res.cloudinary.com/dvnzgjayg/image/upload/v1776542400/zapatillas-running_uknoex.jpg"),
(1, "Camiseta Deportiva Premium", "Tela transpirable de alta calidad",12000,"https://res.cloudinary.com/dvnzgjayg/image/upload/v1776542397/camiseta-deportiva_cu0agr.jpg"),
(2, "Leggings Yoga Fit", "Máxima elasticidad y confort",14400,"https://res.cloudinary.com/dvnzgjayg/image/upload/v1776542401/leggings-yoga_booife.jpg"),
(3, "Conjunto Infantil Deportivo", "Ideal para actividades escolares y recreativas",12000,"https://res.cloudinary.com/dvnzgjayg/image/upload/v1776542399/conjunto-infantil_fgj78u.jpg");

-- TABLA COLORES
INSERT INTO COLORES (nombre_color) VALUES 
('Negro'),
('Blanco'),
('Rojo'),
('Azul');

-- TABLA TALLAS
INSERT INTO TALLAS (nombre) VALUES 
('S'),
('M'),
('L'),
('XL'),
('38'),
('40'),
('42');

-- TABLA VARIANTES
INSERT INTO VARIANTES (id_producto, id_color, id_talla, stock) VALUES 
-- Zapatillas Running Pro Max (id_producto=1)
(1, 1, 5, 10), -- Negro, 38
(1, 1, 6, 15), -- Negro, 40
(1, 2, 6, 5),  -- Blanco, 40

-- Camiseta Deportiva Premium (id_producto=2)
(2, 3, 2, 20), -- Rojo, M
(2, 4, 3, 12), -- Azul, L

-- Leggings Yoga Fit (id_producto=3)
(3, 1, 1, 8),  -- Negro, S
(3, 1, 2, 10), -- Negro, M

-- Conjunto Infantil Deportivo (id_producto=4)
(4, 4, 1, 15); -- Azul, S

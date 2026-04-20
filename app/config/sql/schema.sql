CREATE TABLE CATEGORIAS (
	id_categoria int primary key auto_increment,
	nombre varchar(100),
    descripcion varchar(255),
    estado boolean default true
);

CREATE TABLE PRODUCTOS (
	id_producto int primary key auto_increment,
    id_categoria int,
    nombre_producto varchar(150),
    descripcion varchar(255),
    url_imagen varchar(255),
    precio_unitario decimal(10,2),
    estado boolean default true,
    FOREIGN KEY (id_categoria) REFERENCES CATEGORIAS(id_categoria) ON DELETE SET NULL
);

CREATE TABLE COLORES(
	id_color int primary key auto_increment,
    color varchar(150)
);

CREATE TABLE TALLAS(
	id_talla int primary key auto_increment,
    talla varchar(10)
);

CREATE TABLE VARIANTES(
	id_variante int primary key auto_increment,
    id_producto int,
    id_color int,
    id_talla int,
    stock int default 0,
    FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id_producto) ON DELETE CASCADE,
    FOREIGN KEY (id_color) REFERENCES COLORES(id_color) ON DELETE CASCADE,
    FOREIGN KEY (id_talla) REFERENCES TALLAS(id_talla) ON DELETE CASCADE
)




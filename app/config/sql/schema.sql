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
);

CREATE TABLE USUARIOS (
    id_usuario int primary key auto_increment,
    nombre varchar(100),
    apellidos varchar(100),
    email varchar(150) unique,
    password varchar(255),
    rol varchar(50) default 'cliente',
    estado boolean default true
);

CREATE TABLE PEDIDOS (
    id_pedido int primary key auto_increment,
    id_usuario int,
    total decimal(10,2),
    direccion varchar(255),
    estado varchar(50) default 'pendiente',
    metodo_pago varchar(50),
    fecha datetime default NOW(),
    FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id_usuario) ON DELETE SET NULL
);

CREATE TABLE DETALLES_PEDIDO (
    id_detalle int primary key auto_increment,
    id_pedido int,
    id_producto int,
    cantidad int,
    precio_unitario decimal(10,2),
    talla varchar(50),
    color varchar(50),
    FOREIGN KEY (id_pedido) REFERENCES PEDIDOS(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id_producto) ON DELETE SET NULL
);

CREATE TABLE FACTURACION (
    id_facturacion int primary key auto_increment,
    id_pedido int,
    nombre_completo varchar(200),
    email varchar(150),
    provincia varchar(100),
    direccion_exacta varchar(255),
    FOREIGN KEY (id_pedido) REFERENCES PEDIDOS(id_pedido) ON DELETE CASCADE
);


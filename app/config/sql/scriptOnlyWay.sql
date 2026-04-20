
CREATE TABLE CATEGORIAS (
id_categoria INT AUTO_INCREMENT,
nombre_categoria VARCHAR (100),
descripcion_categoria VARCHAR (255), -- descripciones yo diria que sería más tipo text, asi lo he hecho antes, pero sigo el diagrama
estado  BOOLEAN DEFAULT FALSE,
PRIMARY KEY (id_categoria))
ENGINE=InnoDB DEFAULT CHARSET = utf8mb4; 

CREATE TABLE USUARIOS (
id_usuario INT AUTO_INCREMENT,
nombre VARCHAR (50) NOT NULL,
apellidos VARCHAR (100) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
password VARCHAR (80) NOT NULL, 
rol ENUM('ADMINISTRADOR','VENDEDOR','CLIENTE') DEFAULT 'CLIENTE',
estado_usuario VARCHAR (100) DEFAULT TRUE, 
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id_usuario)) 
ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE PRODUCTOS (
id_producto INT AUTO_INCREMENT,
id_categoria INT NOT NULL,
nombre_producto VARCHAR (255),
descripcion_producto VARCHAR (512),  
precio DOUBLE NOT NULL,
talla ENUM ('S', 'M', 'L', 'XL'),
color VARCHAR (50),
imagen VARCHAR (255),
stock_disponible INT,
estado BOOLEAN DEFAULT FALSE, 
PRIMARY KEY (id_producto),
FOREIGN KEY (id_categoria) REFERENCES CATEGORIAS(id_categoria))
ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE PEDIDOS (
id_pedido INT AUTO_INCREMENT,
id_usuario INT NOT NULL,
fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
total DOUBLE NULL,
PRIMARY KEY (id_pedido),
FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id_usuario))
ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE DETALLES_PEDIDOS (
id_detalle INT AUTO_INCREMENT,
id_pedido INT NOT NULL,
id_producto INT NOT NULL, 
cantidad INT,
precio_unitario DOUBLE NULL,
subtotal DOUBLE NULL,
PRIMARY KEY (id_detalle),
FOREIGN KEY (id_pedido) REFERENCES PEDIDOS(id_pedido),
FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id_producto))
ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE FACTURAS (
id_factura INT AUTO_INCREMENT,
id_pedido INT NOT NULL,
fecha_factura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
metodo_pago ENUM('SINPE', 'CONTRAENTREGA') NOT NULL, -- simple
PRIMARY KEY (id_factura),
FOREIGN KEY (id_pedido) REFERENCES PEDIDOS(id_pedido))
ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;



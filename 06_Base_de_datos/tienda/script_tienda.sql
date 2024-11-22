CREATE SCHEMA tienda_bd;
USE tienda_bd;

SELECT * FROM productos;
SELECT * FROM categorias;

CREATE TABLE categorias(
	categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE productos(
	id_producto INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(50),
    precio NUMERIC(6, 2),
    categoria VARCHAR(30),
    stock INT(3) DEFAULT 0,
    imagen VARCHAR(60),
    descripcion VARCHAR(255),
	FOREIGN KEY (categoria) REFERENCES categorias(categoria)
);
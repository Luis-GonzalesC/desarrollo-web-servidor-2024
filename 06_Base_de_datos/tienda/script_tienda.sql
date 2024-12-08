CREATE SCHEMA tienda_bd;
USE tienda_bd;

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
    CONSTRAINT FK_PRODUCTOS_CATEGORIA FOREIGN KEY (categoria) REFERENCES categorias(categoria) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE usuarios(
	usuario VARCHAR(15) PRIMARY KEY,
    contrasena VARCHAR(255) NOT NULL
);

INSERT INTO categorias VALUES ('Consolas','Esta es la categoría de consolas');
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
VALUES ("PS5", 500, "Consolas", 3, "imagenes/imagen.png", "Esta es una PS5");
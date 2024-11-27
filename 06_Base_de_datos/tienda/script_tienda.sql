CREATE SCHEMA tienda_bd;
USE tienda_bd;

SELECT * FROM productos;
SELECT * FROM categorias;

DROP TABLE categorias;
DROP TABLE productos;

CREATE TABLE categorias(
	categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

INSERT INTO categorias (categoria, descripcion) 
	VALUES ('PS4', 'Juegos para PlayStation 4');
INSERT INTO categorias (categoria, descripcion) 
	VALUES ('PS5', 'Juegos para PlayStation 5');
INSERT INTO categorias (categoria, descripcion) 
	VALUES ('XBOX 360', 'Juegos para XBOX');
INSERT INTO categorias (categoria, descripcion) 
	VALUES ('PC', 'Juegos para PC');

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
-- PRODUCTOS DE PS4
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('The Last of Us Part II', 29.99, 'PS4', 50, '../imagenes/the_last_of_us_parteII.png', 'Un juego de acción y aventura ambientado en un mundo post-apocalíptico');
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('Spider-Man: Miles Morales', 49.99, 'PS4', 30, '../imagenes/spiderman_miles_morales.png', 'Juego de acción basado en el superhéroe de Marvel Comics Miles Morales');
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('God of War', 39.99, 'PS4', 70, '../imagenes/god_of_war.png', 'Aventura de acción en la mitología nórdica, protagonizada por Kratos.');

-- PRODUCTOS DE PS5
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('Marvels Spider-Man 2 ', 49.99, 'PS5', 25, '../imagenes/spiderman_2.png', 'Vuelve el hombre araña en donde Peter Parker y Miles Morales se enfrentan al desafío definitívo, salvar la ciudad de Venom y la amenaza simbionte.');
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('Dragon Ball Sparking Zero', 79.99, 'PS5', 40, '../imagenes/dragon_ball_sparkin_zero.png', 'Lleva a un nuevo nivel el legendario estilo de juego de la serie Budokai Tenkaichi en este juego de acción y lucha');
INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
	VALUES ('Elden Ring Shadow Of The Erdtree Edition ', 49.99, 'PS5', 40, '../imagenes/elden_ring.png', 'Descubre territorios inexplorados enfrentándote a adversarios formidables, donde el drama y la intriga se entrelazan');

CREATE TABLE usuarios(
	usuario VARCHAR(15) PRIMARY KEY,
    contrasena VARCHAR(255)
);

SELECT * FROM usuarios;
SELECT usuario FROM usuarios;


DELETE FROM usuarios where usuario = "alejandra";


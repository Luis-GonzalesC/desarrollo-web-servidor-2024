CREATE SCHEMA videojuegos_bd;

USE videojuegos_bd;
INSERT INTO consolas(nombre, ano_lanzamiento)
	VALUES("Nintendo Switch", "2017");
INSERT INTO consolas(nombre, ano_lanzamiento)
	VALUES("Nintendo Switch 2", "2025");
INSERT INTO consolas(nombre, ano_lanzamiento)
	VALUES("PS5", "20");
    
INSERT INTO videojuegos(titulo, pegi, genero)
	VALUES("Hollow Knight", "PEGI 18", "Aventuras");
INSERT INTO videojuegos(titulo, pegi, genero)
	VALUES("Elden Ring", "PEGI 18", "Souls");
INSERT INTO videojuegos(titulo, pegi, genero)
	VALUES("The Legend of Zelda", "PEGI 7", "Aventuras");
	
SELECT * FROM videojuegos;
    
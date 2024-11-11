CREATE SCHEMA poke_bd;

USE poke_bd;

CREATE TABLE pokemon(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20),
    tipo1 VARCHAR(20),
    tipo2 VARCHAR(20),
    habilidad VARCHAR(15)
);

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Bulbasaur", "Planta", "Veneno", "Espesura");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Ivysaur", "Planta", "Veneno", "Espesura");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Venusaur", "Planta", "Veneno", "Espesura");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Charmander", "Fuego", NULL, "Mar llamas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Charmeleon", "Fuego", NULL, "Mar llamas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Charizard", "Fuego", "Volador", "Mar llamas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Squirtle", "Agua", NULL, "Torrente");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Wartortle", "Agua", NULL, "Espesura");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Blastoise", "Agua", NULL, "Espesura");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Caterpie", "Bicho", NULL, "Polvo escudo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Metapod", "Bicho", NULL, "Mudar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Butterfree", "Bicho", "Volador", "Ojo compuesto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Weedle", "Bicho", "Veneno", "Polvo escudo");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kakuna", "Bicho", "Veneno", "Mudar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Beedrill", "Bicho", "Veneno", "Enjambre");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Pidgey", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Pidgeotto", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Pidgeot", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Rattata", "Normal", NULL, "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Raticate", "Normal", NULL, "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Spearow", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Fearow", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Ekans", "Veneno", NULL, "Intimidación");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Arbok", "Veneno", NULL, "Intimidación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Pikachu", "Eléctrico", NULL, "Electricidad estática");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Raichu", "Eléctrico", NULL, "Electricidad estática");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Sandshrew", "Tierra", NULL, "Velo arena");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Sandslash", "Tierra", NULL, "Velo arena");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidoran♀", "Veneno", NULL, "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidorina♀", "Veneno", NULL, "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidoqueen", "Veneno", "Tierra", "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidoran♂", "Veneno", NULL, "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidorino", "Veneno", NULL, "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Nidoking", "Veneno", "Tierra", "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Clefairy", "Hada", NULL, "Gran encanto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Clefable", "Hada", NULL, "Gran encanto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Vulpix", "Fuego", NULL, "Absorbe fuego");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Ninetales", "Fuego", NULL, "Absorbe fuego");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Jigglypuff", "Normal", "Hada", "Gran encanto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Wigglytuff", "Normal", "Hada", "Gran encanto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Zubat", "Veneno", "Volador", "Fuerza mental");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Golbat", "Veneno", "Volador", "Fuerza mental");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Oddish", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Gloom", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Vileplume", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Paras", "Bicho", "Planta", "Efecto espora");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Parasect", "Bicho", "Planta", "Efecto espora");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Venonat", "Bicho", "Planta", "Ojo compuesto");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Venomoth", "Bicho", "Planta", "Polvo escudo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Diglett", "Tierra", NULL, "Velo arena");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dugtrio", "Tierra", NULL, "Velo arena");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Meowth", "Normal", NULL, "Recogida");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Persian", "Normal", NULL, "Flexibilidad");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Psyduck", "Agua", NULL, "Humedad");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Golduck", "Agua", NULL, "Humedad");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Mankey", "Lucha", NULL, "Espíritu vital");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Primeape", "Lucha", NULL, "Espíritu vital");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Growlithe", "Fuego", NULL, "Intimidación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Arcanine", "Fuego", NULL, "Intimidación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Poliwag", "Agua", NULL, "Absorbe agua");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Poliwhirl", "Agua", NULL, "Absorbe agua");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Poliwrath", "Agua", "Lucha", "Absorbe agua");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Abra", "Psíquico", NULL, "Sincronía");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kadabra", "Psíquico", NULL, "Fuerza mental");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Alakazam", "Psíquico", NULL, "Fuerza mental");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Machop", "Lucha", NULL, "Agallas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Machoke", "Lucha", NULL, "Agallas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Machamp", "Lucha", NULL, "Agallas");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Bellsprout", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Weepinbell", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Victreebel", "Planta", "Veneno", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Tentacool", "Agua", "Veneno", "Cuerpo puro");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Tentacruel", "Agua", "Veneno", "Cuerpo puro");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Geodude", "Roca", "Tierra", "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Graveler", "Roca", "Tierra", "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Golem", "Roca", "Tierra", "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Ponyta", "Fuego", NULL, "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Rapidash", "Fuego", NULL, "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Slowpoke", "Agua", "Psíquico", "Despiste");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Slowbro", "Agua", "Psíquico", "Despiste");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Magnemite", "Eléctrico", "Acero", "Imán");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Magneton", "Eléctrico", "Acero", "Imán");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Farfetch'd", "Normal", "Volador", "Vista lince");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Doduo", "Normal", "Volador", "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dodrio", "Normal", "Volador", "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Seel", "Agua", NULL, "Sebo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dewgong", "Agua", "Hielo", "Sebo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Grimer", "Veneno", NULL, "Hedor");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Muk", "Veneno", NULL, "Hedor");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Shellder", "Agua", NULL, "Caparazón");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Cloyster", "Agua", "Hielo", "Caparazón");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Gastly", "Fantasma", "Veneno", "Levitación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Haunter", "Fantasma", "Veneno", "Levitación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Gengar", "Fantasma", "Veneno", "Levitación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Onix", "Roca", "Tierra", "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Drowzee", "Psíquico", NULL, "Insomnio");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Hypno", "Psíquico", NULL, "Insomnio");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Krabby", "Agua", NULL, "Corte fuerte");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kingler", "Agua", NULL, "Corte fuerte");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Voltorb", "Eléctrico", NULL, "Insonorizar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Electrode", "Eléctrico", NULL, "Insonorizar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Exeggcute", "Planta", "Psíquico", "Clorofila");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Exeggutor", "Planta", "Psíquico", "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Cubone", "Tierra", NULL, "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Marowak", "Tierra", NULL, "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Hitmonlee", "Lucha", NULL, "Flexibilidad");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Hitmonchan", "Lucha", NULL, "Puño Férreo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Lickitung", "Normal", NULL, "Despiste");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Koffing", "Veneno", NULL, "Levitación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Weezing", "Veneno", NULL, "Levitación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Rhyhorn", "Tierra", "Roca", "Pararrayos");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Rhydon", "Tierra", "Roca", "Pararrayos");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Chansey", "Normal", NULL, "Cura natural");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Tangela", "Planta", NULL, "Clorofila");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kangaskhan", "Normal", NULL, "Madrugar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Horsea", "Agua", NULL, "Nado rápido");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Seadra", "Agua", NULL, "Punto tóxico");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Goldeen", "Agua", NULL, "Nado rápido");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Seaking", "Agua", NULL, "Nado rápido");

INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Staryu", "Agua", NULL, "Iluminación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Starmie", "Agua", "Psíquico", "Iluminación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Mr. Mime", "Psíquico", "Hada", "Insonorizar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Scyther", "Bicho", "Volador", "Enjambre");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Jynx", "Hielo", "Psíquico", "Despiste");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Electabuzz", "Eléctrico", NULL, "Electricidad estática");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Magmar", "Fuego", NULL, "Cuerpo llama");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Pinsir", "Bicho", NULL, "Corte fuerte");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Tauros", "Normal", NULL, "Intimidación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Magikarp", "Agua", NULL, "Nado rápido");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Gyarados", "Agua", "Volador", "Intimidación");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Lapras", "Agua", "Hielo", "Absorbe agua");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Ditto", "Normal", NULL, "Flexibilidad");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Eevee", "Normal", NULL, "Fuga");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Vaporeon", "Agua", NULL, "Absorbe agua");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Jolteon", "Eléctrico", NULL, "Absorbe electricidad");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Flareon", "Fuego", NULL, "Absorbe fuego");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Porygon", "Normal", NULL, "Calco");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Omanyte", "Roca", "Agua", "Nado rápido");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Omastar", "Roca", "Agua", "Nado rápido");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kabuto", "Roca", "Agua", "Armadura batalla");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Kabutops", "Roca", "Agua", "Armadura batalla");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Aerodactyl", "Roca", "Volador", "Cabeza roca");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Snorlax", "Normal", NULL, "Sebo");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Articuno", "Hielo", "Volador", "Presión");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Zapdos", "Eléctrico", "Volador", "Presión");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Moltres", "Fuego", "Volador", "Presión");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dratini", "Dragón", NULL, "Mudar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dragonair", "Dragón", NULL, "Mudar");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Dragonite", "Dragón", "Volador", "Fuerza mental");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Mewtwo", "Psíquico", NULL, "Presión");
    
INSERT INTO pokemon (nombre, tipo1, tipo2, habilidad) 
	VALUES ("Mew", "Psíquico", NULL, "Sincronía");
    
SELECT * FROM pokemon;
DROP TABLE pokemon;
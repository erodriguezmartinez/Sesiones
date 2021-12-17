-- Base de datos: Minijuegos
-- Esperanza Rodríguez Martínez

USE Minijuegos2; 

 -- Tabla Usuarios
CREATE TABLE usuarios(
	idusuario tinyint NOT NULL auto_increment PRIMARY KEY,
	nombre	varchar(60) NOT NULL,
	correo	varchar(100) NOT NULL UNIQUE,
	contrasena varchar(20) NOT NULL
);

 -- Tabla Minijuegos
CREATE TABLE minijuegos(
	idjuego tinyint NOT NULL auto_increment PRIMARY KEY,
	nombre	varchar(60) NOT NULL,
	url varchar(500) NOT NULL
);

 -- Tabla Preferencias
CREATE TABLE preferencias(
	idusuario tinyint NOT NULL,
	idjuego	tinyint NOT NULL,
	CONSTRAINT FK_idusuario FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario),
	CONSTRAINT FK_idjuego FOREIGN KEY (idjuego) REFERENCES minijuegos(idjuego),
	CONSTRAINT pk_CP PRIMARY KEY (idusuario,idjuego	)
);

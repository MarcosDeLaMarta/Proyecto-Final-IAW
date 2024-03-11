-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS comic_cloud;

-- Crear la base de datos
CREATE DATABASE comic_cloud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE comic_cloud;

-- Eliminar tablas si existen
DROP TABLE IF EXISTS detalles_pedido;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS comics;

-- Crear tablas
CREATE TABLE comics (
    id_comic INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255),
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255),
    genero VARCHAR(50), 
    descripcion TEXT 
) ENGINE=InnoDB;


CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    password_usuario VARCHAR(255) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL,
    
    UNIQUE KEY (nombre_usuario) 
) ENGINE=InnoDB;

CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(50) DEFAULT 'Pendiente',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
    
) ENGINE=InnoDB;

CREATE TABLE detalles_pedido (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT,
    id_comic INT,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
    FOREIGN KEY (id_comic) REFERENCES comics(id_comic)
    
) ENGINE=InnoDB;

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
    rol INT NOT NULL CHECK (rol IN (1, 2)),
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


-- Insertar datos en tabla comicsç

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('AQUAMAN ESPECIAL 80 ANIVERSARIO', 'BALDEMAR RIVAS - BRANDON THOMAS', 19.99, 'dc/aquaman.jpg', 'DC', 'Libro de historietas encuadernado en cartoné de 192 páginas interiores en color más cubiertas que contiene la traducción de los cómic books originales Aquaman 80th Anniversary 100-Page Super Spectacular, DC Nuclear Winter Special (Extracto Follow the Water), DC The Doomed and the Damned');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('BATMAN # 119 FRONTERA INFINITA 6', 'AMES TYNION IV - JORGE JIMÉNEZ - RICARDO LÓPEZ ORTIZ', 9.99, 'dc/batman.jpg', 'DC', 'Cuaderno de historietas grapado de 72 páginas interiores en color más cubiertas que contiene la traducción de los comic books originales Batman número 111 y Batman: Fear State Alpha número 1 publicado en USA por DC Comics.El Espantapájaros hace su movimiento... ¡y desencadena el Estado de miedo!');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('BATMAN CATWOMAN # 09', 'LIAM SHARP - TOM KING', 12.50, 'dc/catwoman.jpg', 'DC', 'Cuaderno de historietas grapado de 24 páginas interiores en color más cubiertas que contiene la traducción del comic book original Batman/Catwoman número 9 publicado en USA por DC Comics. Serie de 12 volúmenes.Batman y Catwoman vuelven a estar juntos, ¡pero el Joker está a punto de complicar las cos');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('SUPERMAN # 41', 'JOHN ROMITA JR', 4.99, 'dc/PorIdentida.jpg', 'DC', 'Cuaderno de historietas grapado de 24 páginas interiores en color más cubiertas que contiene la traducción del comic book original Superman número 40 publicado en USA por DC Comics. Aunque muy pronto daremos la bienvenida al sustituto de Geoff Johns como guionista regular de Superman, este mes John ...');


INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('DAREDEVIL # 29', 'CHIP ZDARSKY - MANUEL GARCÍA', 7.99, 'marvel/daredevil.jpg', 'Marvel', 'Cuaderno de historietas grapado de 32 páginas interiores en color más cubiertas que contiene la traducción del comic book original Daredevil número 36 publicado en USA por Marvel Comics.¡Último número! Después de un romance que ha florecido a lo largo de los dos últimos años, el Alcalde Fisk y María...');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('MASACRE SAMÚRAI # 01', 'SANSHIRO KASAMA - HIKARU UESUGI', 8.95, 'marvel/deadpool.jpg', 'Marvel', 'Libro de historietas de estilo manga y de género shonen (dirigido al púnlico juvenil) encuadernado en rústica de 232 páginas interiores en blanco y negro más cubiertas con sobrecubierta y sentido de lectura oriental. Sanshiro Kasama y Hikaru Uesugi escriben e ilustran este manga protagonizado por e...');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('EL ASOMBROSO SPIDERMAN TOMO # 01', 'JOE M. STRACZYNSKI - JOHN ROMITA JR.', 22.95, 'marvel/spiderman.jpg', 'Marvel', 'Libro de historietas encuadernado en cartoné de 208 páginas interiores en color más cubiertas que contiene la traducción de los comic books originales Amazing Spider-Man Volume 2 números 30 al 35, 37, 38 publicados en USA por Marvel Comics. ¡Arranca la única serie abierta dentro de Marvel Saga! ');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('SPIDERWOMAN DE HOPELESS', 'DENNIS HOPELESS - ROBBIE THOMPSON', 47.95, 'marvel/spiderwoman.jpg', 'Marvel', 'Libro de historietas encuadernado en rústica de 696 páginas interiores en color más cubiertas con solapas que contiene la traducción de los comic books originales Spiderwoman Volume 4 números 5 a 20, Spider-Woman Volume 5 números 1 a 17, Spider-Women Alpha y Omega, Spider-Gwen números 7 a 8,');


INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('LA BLANCANIEVES PELIRROJA # 10', 'SORATA AKIDUKI', 7.60, 'manga/pelirroja.jpg', 'Manga', 'Libro de historietas de estilo manga y de género shojo (orientado al público juvenil) femenino encuadernado en rústica de 188 páginas interiores en blanco y negro más cubiertas con sobrecubierta y sentido de lectura oriental. Serie de 22 volúmenes.ESTE VOLUMEN INCLUYE UNA SAGA ESPECIAL DONDE DESCUBR.');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('DRAGON BALL # 01 ULTIMATE EDITION', 'AKIRA TORIYAMA', 8.50, 'manga/Dragon-ball.jpg', 'Manga', 'Libro de historietas de estilo manga y de género shonen (orientado al público juvenil) encuadernado en rústica de 240 páginas interiores en blanco más cubiertas con sobrecubierta y sentido de lectura oriental. Serie de 34 volúmenes Son Goku es un chico muy especial que, tras la muerte de su abuelo');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('NII-CHAN', 'HARADA', 9.45, 'manga/nilchan.jpg', 'Manga', 'Libro de historietas de estilo manga y de género shonen (orientado al público juvenil) encuadernado en rústica de 240 páginas interiores en blanco más cubiertas con sobrecubierta y sentido de lectura oriental. Serie de 34 volúmenes Son Goku es un chico muy especial que, tras la muerte de su abuelo');

INSERT INTO comics (titulo, autor, precio, imagen, genero, descripcion)
VALUES ('TOKYO REVENGERS # 04', 'KEN WAKUI', 16.60, 'manga/tokyo.jpg', 'Manga', 'Libro de historietas de estilo manga y de género shonen (orientado al público juvenil) encuadernado en rústica de 400 páginas interiores en blanco y negro más cubiertas con sobrecubierta y sentido de lectura oriental. DA COMIENZO LA BATALLA ENTRE LA TOMAN Y LA WALHALLA: EL HALLOWEEN SANGRIENTO!.');



INSERT INTO usuarios (nombre_usuario, password_usuario, correo_electronico, rol)
VALUES ('marcos', '1234', 'usuario1@example.com', 1);

INSERT INTO usuarios (nombre_usuario, password_usuario, correo_electronico, rol)
VALUES ('admin', '1234', 'usuario2@example.com', 2);
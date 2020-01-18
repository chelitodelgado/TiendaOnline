CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
    id_usuario int auto_increment not null,
    nombre varchar(100) not null,
    apellidos varchar(255),
    email varchar(255) not null,
    password varchar(255) not null,
    rol varchar(20),
    imagen varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id_usuario),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

INSERT INTO usuarios(id_usuario, nombre, apellidos, email, password, rol, imagen) 
            VALUES(null, "Admin", "Admin", "admin@admin.com", "$2y$04$L8ytfhxYorsLfRD/ySGOge/5XR1agIiYfzGH/0oJF39jPUPeWpkHa", "admin", null);

CREATE TABLE categorias(
    id_categoria int auto_increment not null,
    nombre varchar(100),
    CONSTRAINT pk_categoria PRIMARY KEY(id_categoria)
)ENGINE=InnoDB;

INSERT INTO categorias(id_categoria, nombre) VALUES(null, "Manga corta");
INSERT INTO categorias(id_categoria, nombre) VALUES(null, "Tirantes");
INSERT INTO categorias(id_categoria, nombre) VALUES(null, "Sudaderas");
INSERT INTO categorias(id_categoria, nombre) VALUES(null, "Manga lasrga");

CREATE TABLE productos(
    id_producto int auto_increment not null,
    id_categoria int not null,
    nombre varchar(100) not null,
    descripcion text,
    precio float(100,2) not null,
    stock int not null,
    oferta varchar(2),
    fecha date not null, 
    imagen varchar(255),
    CONSTRAINT pk_categorias PRIMARY KEY(id_producto),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE pedidos(
    id_pedido int auto_increment not null,
    id_usuario int not null,
    proviencia varchar(100) not null,
    localidad varchar(100) not null,
    direccion varchar(255) not null,
    coste float(200,2) not null,
    estado  varchar(20) not null,
    fecha date,
    hora time,
    CONSTRAINT pk_pedido PRIMARY KEY(id_pedido),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario)
)ENGINE=InnoDB;


CREATE TABLE lineas_Pedido(
    id_linea int auto_increment not null,
    id_pedido int not null,
    id_producto int not null,
    CONSTRAINT pk_lineas_pedido PRIMARY KEY(id_linea),
    CONSTRAINT fk_linea_pedido FOREIGN KEY(id_pedido) REFERENCES pedidos(id_pedido),
    CONSTRAINT fk_linea_producto FOREIGN KEY(id_producto) REFERENCES productos(id_producto)
)ENGINE=InnoDB;

ALTER TABLE lineas_Pedido ADD unidades int NOT NULL;


INSERT INTO pedidos VALUES(NULL,2,'Mexico','Morelos','calle de las flores #2',355,'confirm',CURDATE(), CURTIME() );
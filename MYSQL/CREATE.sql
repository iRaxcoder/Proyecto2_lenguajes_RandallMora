
CREATE SCHEMA PROYECTO;

CREATE TABLE PROYECTO.ADMIN
(
id_admin int primary key AUTO_INCREMENT NOT NULL,
nombre_usuario varchar (100),
contrasenia varchar(100),
is_deleted bit default 0
);

CREATE TABLE PROYECTO.CLIENTE
(
id_cliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombre_usuario varchar (100),
contrasenia varchar(100),
edad int,
genero varchar(32),
direccion varchar(500),
is_deleted bit default 0
);

CREATE TABLE PROYECTO.ARTICULO
(
id_articulo int PRIMARY KEY AUTO_INCREMENT NOT NULL,
precio int,
descripcion VARCHAR(500),
imagen longblob,
is_deleted bit default 0
);

CREATE TABLE PROYECTO.CATEGORIA
(
id_categoria INT PRIMARY KEY auto_increment NOT NULL,
nombre_categoria VARCHAR(32),
is_deleted bit default 0
);

CREATE TABLE PROYECTO.ARTICULO_CATEGORIA
(
id_articulo int,
id_categoria int,
CONSTRAINT pk_articulo_categoria primary key (id_articulo,id_categoria),
CONSTRAINT fk_articulo_cat FOREIGN KEY (id_articulo) references  PROYECTO.articulo(id_articulo),
CONSTRAINT fk_categoria_art FOREIGN KEY (id_categoria) references  PROYECTO.categoria(id_categoria),
is_deleted bit default 0
);

CREATE TABLE PROYECTO.ARTICULO_FAVORITO
(
id_articulo int,
id_cliente int,
CONSTRAINT pk_articulo_favorito primary key (id_articulo,id_cliente),
CONSTRAINT fk_id_articulo_fav FOREIGN KEY (id_articulo) references  PROYECTO.articulo(id_articulo),
CONSTRAINT fk_id_cliente_art_fav FOREIGN KEY (id_cliente) references  PROYECTO.cliente(id_cliente),
is_deleted bit default 0
);

CREATE TABLE PROYECTO.CARRITO
(
id_articulo INT,
id_cliente INT,
cantidad INT,
is_deleted bit default 0,
CONSTRAINT pk_carrito primary key (id_articulo,id_cliente),
CONSTRAINT fk_id_articulo_carrito FOREIGN KEY (id_articulo) references  PROYECTO.articulo(id_articulo),
CONSTRAINT fk_id_cliente_carrito FOREIGN KEY (id_cliente) references  PROYECTO.cliente(id_cliente)
);

CREATE TABLE PROYECTO.PROMOCION
(
id_promocion int PRIMARY KEY AUTO_INCREMENT NOT NULL ,
id_articulo int,
fecha_inicio date,
fecha_final date,
precio_antes varchar(32),
precio_despues varchar(32),
CONSTRAINT fk_id_articulo_promocion FOREIGN KEY (id_articulo) references  PROYECTO.articulo(id_articulo),
is_deleted bit not null default 0
);

CREATE TABLE PROYECTO.CLIENTE_ARTICULO
(
id_venta int primary key auto_increment not null,
id_cliente int,
id_articulo int,
cantidad int,
sub_total int,
fecha_compra date,
CONSTRAINT fk_id_articulo_art FOREIGN KEY (id_articulo) references  PROYECTO.articulo(id_articulo),
CONSTRAINT fk_id_cliente_vent FOREIGN KEY (id_cliente) references  PROYECTO.cliente(id_cliente),
is_deleted bit not null default 0
);

CREATE TABLE PROYECTO.VENTA
(
id_venta int primary key auto_increment not null,
mes varchar (32),
annio varchar(32),
fecha_completa date,
total varchar(32),
is_deleted bit not null default 0
);

CREATE TABLE PROYECTO.VENTA_ARTICULO
(
id_venta int,
id_venta_articulo int,
is_deleted bit not null default 0,
CONSTRAINT pk_venta_articulo primary key (id_venta,id_venta_articulo),
CONSTRAINT fk_id_venta FOREIGN KEY (id_venta) references  PROYECTO.venta(id_venta),
CONSTRAINT fk_id_venta_articulo FOREIGN KEY (id_venta_articulo) references  PROYECTO.cliente_articulo(id_venta)
);





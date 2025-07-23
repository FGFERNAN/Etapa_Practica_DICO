CREATE DATABASE SGSP;
USE SGSP;

CREATE TABLE proveedores(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100),
    contacto VARCHAR(20),
    empresa VARCHAR(100),
    CONSTRAINT PK_proveedores
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE proveedores
	CHANGE COLUMN nombre nombre VARCHAR(100) NOT NULL UNIQUE,
    CHANGE COLUMN contacto contacto VARCHAR(20) UNIQUE,
    CHANGE COLUMN empresa empresa VARCHAR(100) NOT NULL UNIQUE;

CREATE TABLE categorias(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_categorias
		PRIMARY KEY AUTO_INCREMENT(id)
);

CREATE TABLE modulos(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) UNIQUE NOT NULL,
    descripcion TEXT,
    CONSTRAINT PK_modulos
		PRIMARY KEY AUTO_INCREMENT(id)
);

CREATE TABLE acciones(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100),
    CONSTRAINT PK_acciones
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE acciones 
	CHANGE COLUMN nombre nombre VARCHAR(100) NOT NULL UNIQUE;

CREATE TABLE estado(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado
		PRIMARY KEY AUTO_INCREMENT(id)
);

CREATE TABLE roles(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_roles
		PRIMARY KEY AUTO_INCREMENT(id)
);

CREATE TABLE tipo_documento(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    CONSTRAINT PK_tipo_documento
		PRIMARY KEY AUTO_INCREMENT(id)
);

CREATE TABLE permisos(
	id INT(10) UNSIGNED,
    modulosID INT(10) UNSIGNED,
    rolesID INT(10) UNSIGNED,
    accionesID INT(10) UNSIGNED,
    CONSTRAINT PK_permisos
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_modulos
		FOREIGN KEY (modulosID) REFERENCES modulos(id);
        
ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_roles
		FOREIGN KEY (rolesID) REFERENCES roles(id);
        
ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_acciones
		FOREIGN KEY (accionesID) REFERENCES acciones(id);

CREATE TABLE productos(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    precio DECIMAL(10,2) NOT NULL,
    stock INT(10) NOT NULL,
    CONSTRAINT PK_productos
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE productos
	ADD COLUMN categoriasID INT(10) UNSIGNED,
    ADD COLUMN proveedoresID INT(10) UNSIGNED,
    ADD COLUMN estadoID INT(10) UNSIGNED;
    
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_categorias
		FOREIGN KEY (categoriasID) REFERENCES categorias(id);
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_proveedores
		FOREIGN KEY (proveedoresID) REFERENCES proveedores(id);
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_estado
		FOREIGN KEY (estadoID) REFERENCES estado(id);
        
CREATE TABLE usuarios(
	id INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(50) UNIQUE,
    contrasena VARCHAR(100),
    rolesID INT(10) UNSIGNED,
    estadoID INT(10) UNSIGNED,
    tipo_documentoID INT(10) UNSIGNED,
    CONSTRAINT PK_usuarios
		PRIMARY KEY(id)
);

ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_roles
		FOREIGN KEY (rolesID) REFERENCES roles(id);
        
ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_estado
		FOREIGN KEY (estadoID) REFERENCES estado(id);
        
ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_tipo_documento
		FOREIGN KEY (tipo_documentoID) REFERENCES tipo_documento(id);
        
CREATE TABLE compras(
	id INT(10) UNSIGNED,
    fecha DATETIME,
    total DECIMAL(10,2),
    usuariosID INT(10) UNSIGNED,
    proveedoresID INT(10) UNSIGNED,
    CONSTRAINT PK_compras
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE compras
	CHANGE COLUMN fecha fecha DATETIME NOT NULL,
    CHANGE COLUMN total total DECIMAL(10,2) NOT NULL;

ALTER TABLE compras
	ADD CONSTRAINT FK_compras_usuarios
		FOREIGN KEY (usuariosID) REFERENCES usuarios(id);
        
ALTER TABLE compras
	ADD CONSTRAINT FK_compras_proveedores
		FOREIGN KEY (proveedoresID) REFERENCES proveedores(id);

CREATE TABLE ventas(
	id INT(10) UNSIGNED,
    fecha DATETIME,
    total DECIMAL(10,2),
    usuariosID INT(10) UNSIGNED,
    CONSTRAINT PK_ventas
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE ventas
	CHANGE COLUMN fecha fecha DATETIME NOT NULL,
    CHANGE COLUMN total total DECIMAL(10,2) NOT NULL;

ALTER TABLE ventas
	ADD CONSTRAINT FK_ventas_usuarios
		FOREIGN KEY (usuariosID) REFERENCES usuarios(id);
        
CREATE TABLE detalle_compra(
	id INT(10) UNSIGNED,
    cantidad TINYINT(3),
    precio_unitario DECIMAL(10,2),
    comprasID INT(10) UNSIGNED,
    productos INT(10) UNSIGNED,
    CONSTRAINT PK_detalle_compra
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE detalle_compra
	CHANGE COLUMN cantidad cantidad TINYINT(3) NOT NULL,
    CHANGE COLUMN precio_unitario precio_unitario DECIMAL(10,2) NOT NULL;

ALTER TABLE detalle_compra
	ADD CONSTRAINT FK_detalle_compra_compras
		FOREIGN KEY (comprasID) REFERENCES compras(id);
        
ALTER TABLE detalle_compra
	ADD CONSTRAINT FK_detalle_compra_productos
		FOREIGN KEY (productos) REFERENCES productos(id);
        
CREATE TABLE detalle_venta(
	id INT(10) UNSIGNED,
    cantidad TINYINT(3),
    precio_unitario DECIMAL(10,2),
    ventasID INT(10) UNSIGNED,
    productosID INT(10) UNSIGNED,
    CONSTRAINT PK_detalle_venta
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE detalle_venta 
	CHANGE COLUMN cantidad cantidad TINYINT(3) NOT NULL,
    CHANGE COLUMN precio_unitario precio_unitario DECIMAL(10,2) NOT NULL;

ALTER TABLE detalle_venta
	ADD CONSTRAINT FK_detalle_venta_ventas
		FOREIGN KEY (ventasID) REFERENCES ventas(id);
        
ALTER TABLE detalle_venta
	ADD CONSTRAINT FK_detalle_venta_productos
		FOREIGN KEY (productosID) REFERENCES productos(id);
        
CREATE TABLE historial_operaciones(
	id INT(10) UNSIGNED,
    tipo_operacion VARCHAR(50) NOT NULL,
    descripcion TEXT,
    fecha DATETIME NOT NULL,
    usuariosID INT(10) UNSIGNED,
    CONSTRAINT PK_historial_operaciones
		PRIMARY KEY AUTO_INCREMENT(id)
);

ALTER TABLE historial_operaciones
	ADD CONSTRAINT FK_historial_operaciones_usuarios
		FOREIGN KEY (usuariosID) REFERENCES usuarios(id);



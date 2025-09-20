CREATE DATABASE SGSP;
USE SGSP;

CREATE TABLE proveedores(
	id_proveedores INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    contacto VARCHAR(50) UNIQUE,
    telefono VARCHAR(20) UNIQUE,
    empresa VARCHAR(100) NOT NULL,
    nit VARCHAR(30) NOT NULL UNIQUE,
    fecha_alta DATE,
    fecha_baja DATE,
    fecha_ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_proveedores
		PRIMARY KEY (id_proveedores)
);

ALTER TABLE proveedores 
	CHANGE COLUMN telefono telefono VARCHAR(20) NOT NULL UNIQUE;

ALTER TABLE proveedores
	CHANGE COLUMN fecha_alta fecha_alta DATETIME NULL DEFAULT NULL;
    
ALTER TABLE proveedores 
	CHANGE COLUMN fecha_baja fecha_baja DATETIME NULL DEFAULT NULL;
    
ALTER TABLE proveedores
	CHANGE COLUMN fecha_ingreso fecha_ingreso DATETIME NOT NULL;

ALTER TABLE proveedores
	ADD COLUMN id_estado_proveedor INT(10) UNSIGNED;

ALTER TABLE proveedores
	ADD CONSTRAINT FK_proveedor_estado
		FOREIGN KEY (id_estado_proveedor) REFERENCES estado_proveedor(id_estado_proveedor);

CREATE TABLE categorias(
	id_categorias INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_categorias
		PRIMARY KEY (id_categorias)
);

ALTER TABLE categorias
	ADD COLUMN id_estado INT(10) UNSIGNED;
    
ALTER TABLE categorias 
	CHANGE COLUMN id_estado id_estado_categoria INT(10) UNSIGNED;
    
ALTER TABLE categorias
	ADD CONSTRAINT FK_categorias_estado
		FOREIGN KEY (id_estado_categoria) REFERENCES estado_categoria(id_estado_categoria);

CREATE TABLE modulos(
	id_modulos INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) UNIQUE NOT NULL,
    descripcion TEXT,
    CONSTRAINT PK_modulos
		PRIMARY KEY (id_modulos)
);

DROP TABLE IF EXISTS modulos;

CREATE TABLE acciones(
	id_acciones INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100),
    CONSTRAINT PK_acciones
		PRIMARY KEY (id_acciones)
);

ALTER TABLE acciones 
	CHANGE COLUMN nombre nombre VARCHAR(100) NOT NULL UNIQUE;
    
DROP TABLE IF EXISTS acciones;

CREATE TABLE estado(
	id_estado INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado
		PRIMARY KEY (id_estado)
);

RENAME TABLE estado TO estado_usuario;

ALTER TABLE estado_usuario
	CHANGE COLUMN id_estado id_estado_usuario INT(10) UNSIGNED AUTO_INCREMENT;
    
CREATE TABLE estado_marca(
	id_estado_marca INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado_marca
		PRIMARY KEY (id_estado_marca)
);

ALTER TABLE estado_marca 
	CHANGE COLUMN id_estado_marca id_estado_marca INT(10) UNSIGNED AUTO_INCREMENT;

CREATE TABLE estado_producto(
	id_estado_producto INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado_producto
		PRIMARY KEY (id_estado_producto)
);

ALTER TABLE estado_producto 
	CHANGE COLUMN id_estado_producto id_estado_producto INT(10) UNSIGNED AUTO_INCREMENT;

CREATE TABLE estado_categoria(
	id_estado_categoria INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado_categoria
		PRIMARY KEY (id_estado_categoria)
);

CREATE TABLE estado_proveedor(
	id_estado_proveedor INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_estado_proveedor
		PRIMARY KEY (id_estado_proveedor)
);

CREATE TABLE roles(
	id_roles INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    CONSTRAINT PK_roles
		PRIMARY KEY (id_roles)
);

CREATE TABLE tipo_documento(
	id_tipo_documento INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    CONSTRAINT PK_tipo_documento
		PRIMARY KEY (id_tipo_documento)
);

CREATE TABLE permisos(
	id_permisos INT(10) UNSIGNED AUTO_INCREMENT,
    id_modulos INT(10) UNSIGNED,
    id_roles INT(10) UNSIGNED,
    id_acciones INT(10) UNSIGNED,
    CONSTRAINT PK_permisos
		PRIMARY KEY (id_permisos)
);

ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_modulos
		FOREIGN KEY (id_modulos) REFERENCES modulos(id_modulos);
        
ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_roles
		FOREIGN KEY (id_roles) REFERENCES roles(id_roles);
        
ALTER TABLE permisos
	ADD CONSTRAINT FK_permisos_acciones
		FOREIGN KEY (id_acciones) REFERENCES acciones(id_acciones);
        
DROP TABLE IF EXISTS permisos;
        
CREATE TABLE marca(
	id_marca INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    descripcion TEXT,
    id_estado INT(10) UNSIGNED,
	CONSTRAINT PK_estado
		PRIMARY KEY (id_marca)
);

SHOW CREATE TABLE marca;

ALTER TABLE marca 
	CHANGE COLUMN id_estado id_estado_marca INT(10) UNSIGNED;

ALTER TABLE marca DROP CONSTRAINT FK_marca_estado;

ALTER TABLE marca
	ADD CONSTRAINT FK_marca_estado
		FOREIGN KEY (id_estado_marca) REFERENCES estado_marca(id_estado_marca);

CREATE TABLE productos(
	id_productos INT(10) UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    stock INT(10) NOT NULL,
    lote INT(10) NOT NULL,
    id_categorias INT(10) UNSIGNED,
    id_proveedores INT(10) UNSIGNED,
    id_estado INT(10) UNSIGNED,
    id_marca INT(10) UNSIGNED,
    CONSTRAINT PK_productos
		PRIMARY KEY (id_productos)
);

ALTER TABLE productos
	ADD COLUMN id_usuarios INT(10) UNSIGNED;
    
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_usuarios
		FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios);

ALTER TABLE productos
	ADD COLUMN act_stock DATETIME DEFAULT NULL;

ALTER TABLE productos
	CHANGE COLUMN stock stock INT(10);

ALTER TABLE productos
	ADD COLUMN id_proveedores_contingencia INT(10) UNSIGNED;

ALTER TABLE productos
	ADD CONSTRAINT FK_productos_categorias
		FOREIGN KEY (id_categorias) REFERENCES categorias(id_categorias);
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_proveedores
		FOREIGN KEY (id_proveedores) REFERENCES proveedores(id_proveedores);
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_proveedores_contigencia
		FOREIGN KEY(id_proveedores_contingencia) REFERENCES proveedores(id_proveedores);
        
ALTER TABLE productos
	CHANGE COLUMN id_estado id_estado_producto INT(10) UNSIGNED;
    
ALTER TABLE productos
	DROP COLUMN lote;
    
ALTER TABLE productos DROP CONSTRAINT FK_productos_estado;
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_estado
		FOREIGN KEY (id_estado_producto) REFERENCES estado_producto(id_estado_producto);
        
ALTER TABLE productos
	ADD CONSTRAINT FK_productos_marca
		FOREIGN KEY (id_marca) REFERENCES marca(id_marca);
        
ALTER TABLE productos
	ADD COLUMN descripcion TEXT,
    ADD COLUMN imagen VARCHAR(255);
        
CREATE TABLE usuarios(
	id_usuarios INT(10) UNSIGNED,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(50) UNIQUE,
    contrasena VARCHAR(100),
    id_roles INT(10) UNSIGNED,
    id_estado INT(10) UNSIGNED,
    id_tipo_documento INT(10) UNSIGNED,
    CONSTRAINT PK_usuarios
		PRIMARY KEY(id_usuarios)
);

ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_roles
		FOREIGN KEY (id_roles) REFERENCES roles(id_roles);
        
ALTER TABLE usuarios
	CHANGE COLUMN id_estado id_estado_usuario INT(10) UNSIGNED;
        
ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_estado
		FOREIGN KEY (id_estado_usuario) REFERENCES estado_usuario(id_estado_usuario);
        
ALTER TABLE usuarios
	ADD CONSTRAINT FK_usuarios_tipo_documento
		FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento);
        
CREATE TABLE compras(
	id_compras INT(10) UNSIGNED AUTO_INCREMENT,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    zona_horaria VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    id_usuarios INT(10) UNSIGNED,
    id_proveedores INT(10) UNSIGNED,
    CONSTRAINT PK_compras
		PRIMARY KEY (id_compras)
);

ALTER TABLE compras
	DROP COLUMN zona_horaria;

ALTER TABLE compras
	CHANGE COLUMN fecha_hora fecha_hora DATETIME NOT NULL;

ALTER TABLE compras
	ADD CONSTRAINT FK_compras_usuarios
		FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios);
        
ALTER TABLE compras
	ADD CONSTRAINT FK_compras_proveedores
		FOREIGN KEY (id_proveedores) REFERENCES proveedores(id_proveedores);

CREATE TABLE ventas(
	id_ventas INT(10) UNSIGNED AUTO_INCREMENT,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    zona_horaria VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    id_usuarios INT(10) UNSIGNED,
    CONSTRAINT PK_ventas
		PRIMARY KEY (id_ventas)
);
	
ALTER TABLE ventas
	CHANGE COLUMN cliente cliente VARCHAR(100) NOT NULL;

ALTER TABLE ventas
	DROP COLUMN zona_horaria;
    
ALTER TABLE ventas
	CHANGE COLUMN fecha_hora fecha_hora DATETIME NOT NULL;

ALTER TABLE ventas 
	CHANGE COLUMN id_cliente cliente VARCHAR(100);

ALTER TABLE ventas
	ADD CONSTRAINT FK_ventas_usuarios
		FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios);
        
CREATE TABLE detalle_compra(
	id_detalle_compra INT(10) UNSIGNED AUTO_INCREMENT,
    cantidad TINYINT(3) NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    id_compras INT(10) UNSIGNED,
    id_productos INT(10) UNSIGNED,
    CONSTRAINT PK_detalle_compra
		PRIMARY KEY (id_detalle_compra)
);

ALTER TABLE detalle_compra
	CHANGE COLUMN lote lote VARCHAR(50) UNIQUE NOT NULL;
    
ALTER TABLE detalle_compra
	DROP INDEX lote;

ALTER TABLE detalle_compra 
	ADD COLUMN lote VARCHAR(50),
    ADD COLUMN fecha_vencimiento DATE;

ALTER TABLE detalle_compra
	ADD CONSTRAINT FK_detalle_compra_compras
		FOREIGN KEY (id_compras) REFERENCES compras(id_compras);
        
ALTER TABLE detalle_compra
	ADD CONSTRAINT FK_detalle_compra_productos
		FOREIGN KEY (id_productos) REFERENCES productos(id_productos);
        
CREATE TABLE detalle_venta(
	id_detalle_venta INT(10) UNSIGNED AUTO_INCREMENT,
    cantidad TINYINT(3) NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    id_ventas INT(10) UNSIGNED,
    id_productos INT(10) UNSIGNED,
    CONSTRAINT PK_detalle_venta
		PRIMARY KEY (id_detalle_venta)
);

ALTER TABLE detalle_venta
	ADD CONSTRAINT FK_detalle_venta_ventas
		FOREIGN KEY (id_ventas) REFERENCES ventas(id_ventas);
        
ALTER TABLE detalle_venta
	ADD CONSTRAINT FK_detalle_venta_productos
		FOREIGN KEY (id_productos) REFERENCES productos(id_productos);

        
CREATE TABLE historial_operaciones(
	id_historial_operaciones INT(10) UNSIGNED AUTO_INCREMENT,
    tipo_operacion VARCHAR(50) NOT NULL,
    descripcion TEXT,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_usuarios INT(10) UNSIGNED,
    CONSTRAINT PK_historial_operaciones
		PRIMARY KEY (id_historial_operaciones)
);

ALTER TABLE historial_operaciones
	CHANGE COLUMN fecha_hora fecha_hora DATETIME NULL DEFAULT NULL;

ALTER TABLE historial_operaciones
	ADD CONSTRAINT FK_historial_operaciones_usuarios
		FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios);


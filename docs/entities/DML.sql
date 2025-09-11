USE sgsp;

INSERT INTO estado_marca (nombre, descripcion) VALUES
('Activo', 'Marca disponible para asignar a productos'),
('Inactivo', 'Marca deshabilitada, no asignable a nuevos productos'),
('Pendiente', 'Marca en espera de aprobación para su uso'),
('Suspendida', 'Marca bloqueada temporalmente');

SELECT * FROM estado_marca;

INSERT INTO estado_categoria (nombre, descripcion) VALUES
('Activo', 'Categoría activa y disponible'),
('Inactivo', 'Categoría temporalmente deshabilitada'),
('En Mantenimiento', 'En proceso de actualización/reorganización'),
('Descontinuado', 'Ya no se usa esta categoría'),
('Estacional', 'Solo disponible en ciertas épocas del año'),
('Pendiente', 'En proceso de configuración/aprobación');

SELECT * FROM estado_categoria;

INSERT INTO estado_producto (nombre, descripcion) VALUES ('Bajo Stock', 'Producto con bajo stock')
('Activo', 'Producto disponible para venta normal'),
('Inactivo', 'Producto temporalmente deshabilitado'),
('Agotado', 'Sin stock disponible'),
('Descontinuado', 'Ya no se maneja este producto'),
('Suspendido', 'Suspendido por problemas de calidad/proveedor'),
('Vencido', 'Producto con fecha de vencimiento expirada'),
('En Promocion', 'Producto en oferta especial'),
('Pendiente', 'En proceso de activación/aprobación'),
('Retirado', 'Retirado del mercado'),
('Estacional', 'Disponible solo en ciertas épocas'),
('Preventa', 'Disponible para reserva, aún no llegó'),
('Dañado', 'Producto con daños físicos');

SELECT * FROM estado_producto;

INSERT INTO estado_usuario (nombre, descripcion) VALUES 
('Bloqueado', 'Bloqueado por intentos fallidos de login'),
('Suspendido', 'Suspendido por violación de políticas'),
('Pendiente', 'Esperando activación/aprobación'),
('Expirado', 'Cuenta expirada, necesita renovación'),
('Vacaciones', 'Usuario en período de vacaciones'),
('Retirado', 'Ex-empleado, cuenta cerrada'),
('Temporal', 'Acceso temporal limitado'),
('Prueba', 'Usuario de prueba/demostración');

SELECT * FROM estado_usuario;

INSERT INTO estado_proveedor (nombre, descripcion) VALUES 
('Activo', 'Proveedor activo con operaciones normales'),
('Inactivo', 'Proveedor temporalmente deshabilitado'),
('Suspendido', 'Suspendido por incumplimientos'),
('Bloqueado', 'Bloqueado por problemas legales/financieros'),
('Pendiente', 'En proceso de aprobación/homologación'),
('En Prueba', 'Período de prueba comercial'),
('Contingencia', 'Proveedor de respaldo/emergencia'),
('En_Liquidacion', 'En proceso de cierre comercial'),
('Terminado', 'Relación comercial terminada'),
('Estacional', 'Proveedor solo en ciertas temporadas');

SELECT * FROM estado_proveedor;

SELECT p.*, m.nombre AS marca_nombre, e.nombre AS estado_nombre
FROM productos p
JOIN estado e ON p.id_estado = e.id_estado
JOIN marca m ON p.id_marca = m.id_marca;

INSERT INTO marca(nombre, descripcion, id_estado_marca) VALUES ('Diana', 'La marca Diana, principalmente conocida en Colombia y El Salvador, es un grupo industrial diversificado con enfoque en consumo masivo y agroindustria.', 1);
INSERT INTO marca(nombre, descripcion, id_estado_marca) VALUES ('Colgate', 'Colgate es una marca globalmente conocida, principalmente por sus productos de cuidado bucal como pastas dentales, cepillos de dientes, enjuagues bucales e hilo dental.', 1);
INSERT INTO marca(nombre, descripcion, id_estado_marca) VALUES ('Colanta', 'Colanta es una cooperativa colombiana fabricante de productos alimenticios que incluye lácteos, ​ refrescos, embutidos, y cereales. Esta empresa exporta a Canadá, Curazao, Estados Unidos, Guatemala, San Martín y Venezuela.​', 1);
INSERT INTO marca(nombre, descripcion, id_estado_marca) VALUES ('Zenú', 'Fue fundada en la década de 1950 en Colombia y se dedica a la producción y comercialización de productos cárnicos, especialmente embutidos y carnes frías', 1);
SELECT * FROM categorias;

# Consulta para seleccionar categorias que se mostraran en el select de crear producto
SELECT c.*, e.nombre AS estado_nombre FROM categorias_con_contador c
JOIN estado_categoria e ON c.estado = e.id_estado_categoria
WHERE c.estado != 2 
AND c.estado != 3
AND c.estado != 4;

SELECT * FROM categorias_con_contador;

SELECT * FROM proveedores;

SELECT * FROM productos WHERE id_proveedores_contingencia IS NULL;

SELECT * FROM usuarios;
SELECT * FROM estado_usuario;	

INSERT INTO roles(nombre, descripcion) VALUES ('Administrador', 'Rol que puede ejecutar cualquier acción en el sistema'),
('Supervisor', 'Supervisar operaciones, generar reportes, gestionar stock crítico'),
('Vendedor', 'Procesar ventas, consultar precios y stock'),
('Bodega/Almacen', 'Control de inventario, recepción de mercancía, gestión de proveedores y categorias');

INSERT INTO tipo_documento(nombre) VALUES ('Cédula de Ciudadanía'), ('Tarjeta de Identidad'), ('Cédula de Extranjería'),
('Registro Civil de Nacimiento');

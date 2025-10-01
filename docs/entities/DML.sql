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

INSERT INTO estado_producto (nombre, descripcion) VALUES ('Bajo Stock', 'Producto con bajo stock'),
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

SELECT DISTINCT tipo_operacion FROM historial_operaciones;

# Limpieza datos de prueba
TRUNCATE TABLE detalle_compra;
TRUNCATE TABLE detalle_venta;
TRUNCATE TABLE historial_operaciones;

# Consultas Inserción de datos
INSERT INTO proveedores(nombre, contacto, telefono, empresa, nit, id_estado_proveedor) VALUES 
('Juan Valdez', 'servicioalcliente@juanvaldezcafe.com', '6013269200', 'Procafecol S.A.', '830097912-1', 1),
('Alpina', 'servicioalconsumidor@alpina.com', '6014238000', 'Alpina Productos Alimenticios S.A.', '860025900-2', 1),
('Postobón', 'servicioalcliente@postobon.com.co', '018000515959', 'Postobón S.A.', '890903939-6', 1),
('Bavaria', 'atencionalcliente@bavaria.co', '6016389000', 'Bavaria S.A.', '860005224-6', 1),
('Colombina', 'servicioalcliente@colombina.com', '018000931111', 'Colombina S.A.', '890301127-1', 1),
('Grupo Nutresa', 'atencion.consumidor@nutresa.com', '018000516688', 'Grupo Nutresa S.A.', '890900290-3', 1),
('Fábrica de Licores de Antioquia', 'contactenos@fla.com.co', '6043557000', 'Fábrica de Licores y Alcoholes de Antioquia E.I.C.E.', '890900287-1', 1),
('Pepsico Alimentos Colombia', 'servicioalcliente.colombia@pepsico.com', '018000911007', 'Pepsico Alimentos Colombia Ltda.', '860022467-1', 1),
('Unilever', 'consumidor.co@unilever.com', '6017438100', 'Unilever Andina Colombia Ltda.', '860004480-1', 1),
('Kimberly-Clark', 'servicioalconsumidor.col@kcc.com', '018000512626', 'Colombiana Kimberly Colpapel S.A.', '860001604-1', 1),
('Procter & Gamble', 'contacto.co@pg.com', '018000915334', 'Procter & Gamble Colombia Ltda.', '860029245-5', 1),
('Grupo Éxito', 'servicioalcliente@grupo-exito.com', '018000428800', 'Almacenes Éxito S.A.', '890900608-9', 1),
('Colanta', 'servicioalasociado@colanta.com.co', '6044455555', 'Cooperativa Colanta', '890901358-1', 1),
('Ramo', 'servicioalcliente@ramo.com.co', '6014375200', 'Productos Ramo S.A.', '860002551-7', 1),
('Incauca', 'info@incauca.com', '6024185100', 'Incauca S.A.S.', '890306161-5', 1),
('Diana Corporación', 'sac@dianacor.com', '018000914441', 'Diana Corporación S.A.S.', '860002251-5', 1),
('Harina Tres Castillos', 'servicioalcliente@pastascomarrico.com', '6053617000', 'Harina Tres Castillos S.A.S.', '890100253-1', 1),
('Aldor', 'contacto@aldor.com.co', '6026875100', 'Aldor S.A.S.', '805011700-1', 1),
('Team Foods', 'servicioalcliente@teamfoods.com', '6012988888', 'Team Foods Colombia S.A.', '800201111-2', 1),
('Goya para Colombia', 'info@goya.com.co', '6017443131', 'Goya para Colombia S.A.S.', '900449521-1', 1);

INSERT INTO marca(nombre, descripcion, id_estado_marca) VALUES 
('Alpina', 'Marca colombiana de productos lácteos, postres y bebidas.', 1),
('Zenú', 'Marca líder en carnes frías, embutidos y alimentos enlatados.', 1),
('Fruco', 'Reconocida por sus salsas, mayonesas y aderezos.', 1),
('Saltín Noel', 'Galletas de soda tradicionales, un clásico en los hogares colombianos.', 1),
('Sello Rojo', 'Popular marca de café molido y en grano de alta calidad.', 1),
('Margarina La Fina', 'Margarina de uso común para cocinar y untar.', 1),
('Doria', 'Líder en el mercado de pastas alimenticias en Colombia.', 1),
('Arroz Diana', 'Una de las marcas de arroz más consumidas en el país.', 1),
('El Rey', 'Marca especializada en condimentos, especias y sazonadores.', 1),
('Fabuloso', 'Limpiadores multiusos y desinfectantes para el hogar.', 1),
('Axion', 'Lavaloza en crema y líquido para la limpieza de la vajilla.', 1),
('Colgate', 'Marca líder en cuidado oral, incluyendo cremas dentales y cepillos.', 1),
('Protex', 'Jabones de tocador con propiedades antibacteriales.', 1),
('Savital', 'Línea de productos para el cuidado del cabello a base de sábila.', 1),
('Nosotras', 'Productos de protección e higiene femenina.', 1),
('Pequeñín', 'Pañales y productos para el cuidado de los bebés.', 1),
('Coca-Cola', 'La marca de gaseosa más reconocida a nivel mundial.', 1),
('Milo', 'Bebida en polvo a base de malta y chocolate.', 1),
('Tosh', 'Línea de galletas, snacks y bebidas enfocada en el bienestar.', 1),
('Jet', 'Chocolatinas y productos de chocolate de la Compañía Nacional de Chocolates.', 1);

INSERT INTO categorias(nombre, descripcion, id_estado_categoria) VALUES 
('Lácteos y Huevos', 'Productos como leche, quesos, yogures, mantequillas y huevos.', 1),
('Carnes, Aves y Pescados', 'Incluye carnes rojas, pollo, pescado fresco y mariscos.', 1),
('Frutas y Verduras', 'Productos frescos del campo, tanto frutas como hortalizas y verduras.', 1),
('Panadería y Repostería', 'Pan fresco, pasteles, galletas, y productos horneados del día.', 1),
('Despensa', 'Alimentos no perecederos como arroz, pastas, enlatados, granos y aceites.', 1),
('Bebidas', 'Jugos, gaseosas, aguas, tés y otras bebidas no alcohólicas.', 1),
('Congelados', 'Alimentos que requieren congelación como helados, verduras y comidas preparadas.', 1),
('Snacks y Dulces', 'Papas fritas, galletas, golosinas, chocolates y otros aperitivos.', 1),
('Cuidado Personal', 'Artículos de higiene personal como champú, jabón, desodorantes y cremas.', 1),
('Aseo del Hogar', 'Productos para la limpieza de la casa, como detergentes y desinfectantes.', 1),
('Mascotas', 'Alimento y accesorios para perros, gatos y otras mascotas.', 1),
('Bebés', 'Productos para el cuidado de bebés, como pañales, compotas y fórmulas.', 1),
('Licores y Vinos', 'Bebidas alcohólicas como cervezas, vinos y licores nacionales e importados.', 1),
('Embutidos y Fiambres', 'Jamones, salchichas, tocinetas y otras carnes procesadas.', 1),
('Café, Té y Chocolate', 'Variedades de café en grano o molido, tés en infusión y chocolates de mesa.', 1),
('Salsas y Aderezos', 'Salsas de tomate, mayonesas, mostazas y otros condimentos para comidas.', 1);

INSERT INTO productos(nombre, precio_compra, precio_venta, id_categorias, id_proveedores, id_estado_producto, id_marca, descripcion) VALUES 
('Limpiador Multiusos Fabuloso Lavanda 1 Litro', 5500.00, 7200.00, 38, 44, 1, 16, 'Limpiador desinfectante con aroma a lavanda para pisos y superficies.'),
('Lavaloza Líquido Axion Limón x 500ml', 6800.00, 8500.00, 38, 45, 1, 17, 'Lavaplatos líquido concentrado con poder arranca grasa y aroma a limón.'),
('Crema Dental Colgate Triple Acción x 100ml', 5200.00, 6900.00, 37, 44, 1, 18, 'Crema dental con triple beneficio: protección anticaries, extra blancura y aliento fresco.'),
('Jabón de Baño Protex Avena x 120g', 2900.00, 3800.00, 37, 44, 1, 19, 'Jabón antibacterial con avena para una piel suave y protegida.'),
('Shampoo Savital con Sábila y Keratina x 550ml', 13500.00, 16800.00, 37, 42, 1, 20, 'Shampoo para el cuidado del cabello, dejándolo suave y brillante.'),
('Toallas Higiénicas Nosotras Normal Paquete x 10', 4500.00, 5800.00, 37, 43, 1, 21, 'Toallas de flujo normal con cubierta suave para mayor comodidad.'),
('Pañales Pequeñín Etapa 3 Paquete x 30', 25000.00, 31000.00, 40, 43, 1, 22, 'Pañales absorbentes para bebés de 7 a 11 kg.'),
('Gaseosa Coca-Cola Sabor Original x 1.5 Litros', 3800.00, 4900.00, 34, 36, 1, 23, 'Bebida carbonatada refrescante con sabor original.'),
('Bebida Achocolatada Milo en Polvo x 400g', 11500.00, 14500.00, 34, 39, 1, 24, 'Mezcla en polvo para preparar bebida de malta y chocolate, enriquecida con vitaminas.'),
('Galletas Tosh Miel y Avena Paquete x 6', 4200.00, 5500.00, 36, 39, 1, 25, 'Galletas integrales con avena en hojuelas y un toque de miel.'),
('Chocolatina Jet Tradicional x 12g', 500.00, 800.00, 36, 39, 1, 26, 'Clásica chocolatina de leche, ideal para un snack rápido.'),
('Huevos AA Rojos Cubeta x 30 Unidades', 16000.00, 21000.00, 29, 45, 1, 7, 'Huevos frescos de gallina, categoría AA.'),
('Aguardiente Antioqueño Tapa Azul Botella x 750ml', 35000.00, 43000.00, 41, 40, 1, 15, 'Aguardiente tradicional sin azúcar, producto insignia de la FLA.'),
('Lomo de Cerdo Entero (Aprox. 1kg)', 18000.00, 24000.00, 30, 45, 1, 8, 'Corte de cerdo magro y tierno, ideal para hornear o freír.'),
('Banano Criollo por Kilo', 2000.00, 2800.00, 31, 45, 1, 9, 'Fruta fresca, precio por kilogramo.'),
('Papas Fritas Pepsico Sabor Natural x 110g', 3500.00, 4600.00, 36, 41, 1, 25, 'Hojuelas de papa fritas con sal, crocantes y deliciosas.'),
('Azúcar Blanca Incauca Bolsa x 1kg', 4000.00, 5100.00, 33, 48, 1, 13, 'Azúcar de caña refinada, ideal para endulzar bebidas y postres.'),
('Ponqué Gala Ramo Tradicional', 4500.00, 5900.00, 32, 47, 1, 10, 'Pequeño ponqué individual con cubierta sabor a chocolate.'),
('Cerveza Poker Lata x 6 Unidades', 12500.00, 15000.00, 41, 37, 1, 23, 'Cerveza tipo lager, una de las más populares en Colombia.'),
('Atún Van Camps en Aceite Lata x 160g', 5500.00, 7000.00, 33, 39, 1, 8, 'Lomos de atún en aceite vegetal, listos para consumir.'),
('Queso Campesino Colanta Bloque x 250g', 6500.00, 8200.00, 29, 46, 1, 7, 'Queso fresco y bajo en sal, ideal para asar o acompañar.'),
('Salsa de Tomate Fruco Doypack x 200g', 2300.00, 3100.00, 44, 42, 1, 9, 'Salsa de tomate tradicional para acompañar todo tipo de comidas.'),
('Chocolate Corona para Mesa Barra x 500g', 8500.00, 10500.00, 43, 39, 1, 26, 'Pastillas de chocolate amargo para preparar bebida caliente.'),
('Frijol Cargamanto Goya Bolsa x 500g', 5800.00, 7500.00, 33, 53, 1, 14, 'Frijol seco de la variedad cargamanto, base de la bandeja paisa.');

UPDATE productos SET stock = 0;
USE sgsp;

INSERT INTO productos(nombre, precio, stock, descripcion, imagen) VALUES ('Hola', 12.20, 2, 'descripción', null);

SELECT * FROM productos;

INSERT INTO estado(nombre, descripcion) VALUES ('Activo', 'El objeto que tenga este estado es porque aún esta en funcionamiento en el sistema'),
('Inactivo','El objeto que tenga este estado es porque no se utilizará temporal o permanente en el sistema');

SELECT p.*, e.nombre AS estado_nombre
FROM productos p
JOIN estado e ON p.estadoID = e.id;

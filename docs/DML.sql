USE sgsp;

INSERT INTO estado(nombre, descripcion) VALUES ('Activo', 'El objeto que tenga este estado es porque aún esta en funcionamiento en el sistema'),
('Inactivo','El objeto que tenga este estado es porque no se utilizará temporal o permanente en el sistema');

SELECT * FROM estado;

SELECT p.*, m.nombre AS marca_nombre, e.nombre AS estado_nombre
FROM productos p
JOIN estado e ON p.id_estado = e.id_estado
JOIN marca m ON p.id_marca = m.id_marca;

INSERT INTO marca(nombre, descripcion, id_estado) VALUES ('Diana', 'La marca Diana, principalmente conocida en Colombia y El Salvador, es un grupo industrial diversificado con enfoque en consumo masivo y agroindustria.', 1);
INSERT INTO marca(nombre, descripcion, id_estado) VALUES ('Colgate', 'Colgate es una marca globalmente conocida, principalmente por sus productos de cuidado bucal como pastas dentales, cepillos de dientes, enjuagues bucales e hilo dental.', 1);
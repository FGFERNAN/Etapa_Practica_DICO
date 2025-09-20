DELIMITER //
CREATE TRIGGER trg_after_insert_productos
AFTER INSERT ON productos
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Creación Producto', 'Se registró un nuevo producto', NOW(), NEW.id_usuarios);
END;
//
DELIMITER ;
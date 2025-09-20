DELIMITER //
CREATE TRIGGER trg_after_update_productos
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Actualización Producto', 'Se actualizó un producto existente', NOW(), NEW.id_usuarios);
END;
//
DELIMITER ;
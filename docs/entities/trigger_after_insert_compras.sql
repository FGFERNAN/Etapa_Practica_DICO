DELIMITER //
CREATE TRIGGER trg_after_insert_compras
AFTER INSERT ON compras
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Compra', 'Se registró una nueva compra', NEW.fecha_hora, NEW.id_usuarios);
END;
//
DELIMITER ;
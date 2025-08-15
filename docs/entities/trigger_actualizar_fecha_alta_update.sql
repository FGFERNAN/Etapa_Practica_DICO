DELIMITER $$

CREATE TRIGGER actualizar_fecha_alta_update
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
    IF NEW.id_proveedores IS NOT NULL THEN
        UPDATE proveedores 
        SET fecha_alta = NOW() 
        WHERE id_proveedores = NEW.id_proveedores 
        AND fecha_alta IS NULL;
    END IF;
END$$

DELIMITER ;
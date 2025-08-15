DELIMITER $$

CREATE TRIGGER manejar_fecha_baja
BEFORE UPDATE ON proveedores
FOR EACH ROW
BEGIN
    -- Si el estado cambió a inactivo (2), asignar fecha_baja
    IF NEW.id_estado_proveedor = 2 AND OLD.id_estado_proveedor != 2 THEN
        SET NEW.fecha_baja = NOW();
    END IF;
    
    -- Si el estado cambió de inactivo a activo, limpiar fecha_baja
    IF NEW.id_estado_proveedor != 2 AND OLD.id_estado_proveedor = 2 THEN
        SET NEW.fecha_baja = NULL;
    END IF;
END$$

DELIMITER ;
DELIMITER $$

CREATE TRIGGER asignar_fecha_ingreso
BEFORE INSERT ON proveedores
FOR EACH ROW
BEGIN
    SET NEW.fecha_ingreso = NOW();
END$$

DELIMITER ;
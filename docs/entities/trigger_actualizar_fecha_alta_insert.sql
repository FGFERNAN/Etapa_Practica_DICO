DELIMITER $$

CREATE TRIGGER actualizar_fecha_alta
AFTER INSERT ON productos
FOR EACH ROW
BEGIN
    -- Solo actualizar si el producto tiene un proveedor asignado
    -- y la fecha_alta del proveedor está vacía (primera asignación)
    IF NEW.id_proveedores IS NOT NULL THEN
        UPDATE proveedores 
        SET fecha_alta = NOW() 
        WHERE id_proveedores = NEW.id_proveedores 
        AND fecha_alta IS NULL;
    END IF;
END$$

DELIMITER ;
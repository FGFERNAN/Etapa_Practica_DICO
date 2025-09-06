DELIMITER $$
CREATE TRIGGER actualizar_estado_stock
BEFORE UPDATE ON productos
FOR EACH ROW
BEGIN
    IF NEW.stock != OLD.stock AND NEW.stock IS NOT NULL THEN
        IF NEW.stock = 0 THEN
            SET NEW.id_estado_producto = 3;
        ELSEIF NEW.stock <= 10 THEN
            SET NEW.id_estado_producto = 13;
        ELSE
            SET NEW.id_estado_producto = 1;
        END IF;
    END IF;
END$$
DELIMITER ;
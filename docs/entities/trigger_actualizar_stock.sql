DELIMITER $$
CREATE TRIGGER actualizar_stock
BEFORE UPDATE ON productos
FOR EACH ROW
BEGIN
    IF NEW.stock != OLD.stock AND NEW.stock IS NOT NULL THEN
        SET NEW.act_stock = NOW();
    END IF;
END$$
DELIMITER ;
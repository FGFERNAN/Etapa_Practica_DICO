CREATE DATABASE  IF NOT EXISTS `sgsp` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `sgsp`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sgsp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id_categorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_estado_categoria` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_categorias`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `FK_categorias_estado` (`id_estado_categoria`),
  CONSTRAINT `FK_categorias_estado` FOREIGN KEY (`id_estado_categoria`) REFERENCES `estado_categoria` (`id_estado_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (29,'Lácteos y Huevos','Productos como leche, quesos, yogures, mantequillas y huevos.',1),(30,'Carnes, Aves y Pescados','Incluye carnes rojas, pollo, pescado fresco y mariscos.',1),(31,'Frutas y Verduras','Productos frescos del campo, tanto frutas como hortalizas y verduras.',1),(32,'Panadería y Repostería','Pan fresco, pasteles, galletas, y productos horneados del día.',1),(33,'Despensa','Alimentos no perecederos como arroz, pastas, enlatados, granos y aceites.',1),(34,'Bebidas','Jugos, gaseosas, aguas, tés y otras bebidas no alcohólicas.',1),(35,'Congelados','Alimentos que requieren congelación como helados, verduras y comidas preparadas.',1),(36,'Snacks y Dulces','Papas fritas, galletas, golosinas, chocolates y otros aperitivos.',1),(37,'Cuidado Personal','Artículos de higiene personal como champú, jabón, desodorantes y cremas.',1),(38,'Aseo del Hogar','Productos para la limpieza de la casa, como detergentes y desinfectantes.',1),(39,'Mascotas','Alimento y accesorios para perros, gatos y otras mascotas.',1),(40,'Bebés','Productos para el cuidado de bebés, como pañales, compotas y fórmulas.',1),(41,'Licores y Vinos','Bebidas alcohólicas como cervezas, vinos y licores nacionales e importados.',1),(42,'Embutidos y Fiambres','Jamones, salchichas, tocinetas y otras carnes procesadas.',1),(43,'Café, Té y Chocolate','Variedades de café en grano o molido, tés en infusión y chocolates de mesa.',1),(44,'Salsas y Aderezos','Salsas de tomate, mayonesas, mostazas y otros condimentos para comidas.',1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `categorias_con_contador`
--

DROP TABLE IF EXISTS `categorias_con_contador`;
/*!50001 DROP VIEW IF EXISTS `categorias_con_contador`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `categorias_con_contador` AS SELECT 
 1 AS `id_categorias`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `estado`,
 1 AS `cantidad_productos`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id_compras` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuarios` int(10) unsigned DEFAULT NULL,
  `id_proveedores` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_compras`),
  KEY `FK_compras_usuarios` (`id_usuarios`),
  KEY `FK_compras_proveedores` (`id_proveedores`),
  CONSTRAINT `FK_compras_proveedores` FOREIGN KEY (`id_proveedores`) REFERENCES `proveedores` (`id_proveedores`),
  CONSTRAINT `FK_compras_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (83,'2025-10-01 02:21:13',98175.00,1030533364,44),(84,'2025-10-01 02:21:22',202300.00,1030533364,39),(85,'2025-10-01 02:21:55',53550.00,1030533364,43),(86,'2025-10-01 02:22:28',446250.00,1030533364,49),(87,'2025-10-01 02:22:39',1874250.00,1030533364,40),(88,'2025-10-01 02:23:02',483140.00,1030533364,53),(89,'2025-10-01 02:30:25',1041250.00,1030533364,43),(90,'2025-10-01 02:30:41',38675.00,1030533364,46),(91,'2025-10-01 02:31:42',963900.00,1030533364,42),(92,'2025-10-01 02:32:47',2506140.00,1030533364,45),(93,'2025-10-01 02:33:41',753151.00,1030533364,44);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER asignar_fecha_hora
BEFORE INSERT ON compras
FOR EACH ROW
BEGIN
    SET NEW.fecha_hora = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trg_after_insert_compras
AFTER INSERT ON compras
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Compra', 'Se registró una nueva compra', NEW.fecha_hora, NEW.id_usuarios);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_compra` (
  `id_detalle_compra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(3) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `id_compras` int(10) unsigned DEFAULT NULL,
  `id_productos` int(10) unsigned DEFAULT NULL,
  `lote` varchar(50) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_detalle_compra`),
  KEY `FK_detalle_compra_compras` (`id_compras`),
  KEY `FK_detalle_compra_productos` (`id_productos`),
  CONSTRAINT `FK_detalle_compra_compras` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id_compras`),
  CONSTRAINT `FK_detalle_compra_productos` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (12,15,5500.00,83,102,'','0000-00-00'),(13,20,8500.00,84,125,'','0000-00-00'),(14,10,4500.00,85,108,'','0000-00-00'),(15,127,2500.00,86,72,'468905','2025-11-28'),(16,45,35000.00,87,115,'','0000-00-00'),(17,70,5800.00,88,126,'4567932','2026-01-06'),(18,35,25000.00,89,109,'','0000-00-00'),(19,5,6500.00,90,123,'345678','2025-11-07'),(20,30,2300.00,91,124,'234890','2025-10-31'),(21,15,8900.00,91,67,'234679','2025-10-31'),(22,45,13500.00,91,107,'','0000-00-00'),(23,35,12000.00,92,66,'769067','2025-10-31'),(24,20,6800.00,92,104,'','0000-00-00'),(25,50,16000.00,92,114,'235045','2025-10-31'),(26,35,18000.00,92,116,'1245678','2025-11-07'),(27,60,2000.00,92,117,'','0000-00-00'),(28,13,5500.00,93,102,'','0000-00-00'),(29,45,5500.00,93,103,'','0000-00-00'),(30,23,5200.00,93,105,'','0000-00-00'),(31,67,2900.00,93,106,'','0000-00-00');
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(3) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `id_ventas` int(10) unsigned DEFAULT NULL,
  `id_productos` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_detalle_venta`),
  KEY `FK_detalle_venta_ventas` (`id_ventas`),
  KEY `FK_detalle_venta_productos` (`id_productos`),
  CONSTRAINT `FK_detalle_venta_productos` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`),
  CONSTRAINT `FK_detalle_venta_ventas` FOREIGN KEY (`id_ventas`) REFERENCES `ventas` (`id_ventas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (1,1,4900.00,30,110),(2,1,14500.00,31,111),(3,5,31000.00,32,109),(4,1,4000.00,32,71),(5,1,5100.00,33,119),(6,3,3800.00,33,106);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_categoria`
--

DROP TABLE IF EXISTS `estado_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_categoria` (
  `id_estado_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_estado_categoria`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_categoria`
--

LOCK TABLES `estado_categoria` WRITE;
/*!40000 ALTER TABLE `estado_categoria` DISABLE KEYS */;
INSERT INTO `estado_categoria` VALUES (1,'Activo','Categoría activa y disponible'),(2,'Inactivo','Categoría temporalmente deshabilitada'),(3,'En Mantenimiento','En proceso de actualización/reorganización'),(4,'Descontinuado','Ya no se usa esta categoría'),(5,'Estacional','Solo disponible en ciertas épocas del año'),(6,'Pendiente','En proceso de configuración/aprobación');
/*!40000 ALTER TABLE `estado_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_marca`
--

DROP TABLE IF EXISTS `estado_marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_marca` (
  `id_estado_marca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_estado_marca`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_marca`
--

LOCK TABLES `estado_marca` WRITE;
/*!40000 ALTER TABLE `estado_marca` DISABLE KEYS */;
INSERT INTO `estado_marca` VALUES (1,'Activo','Marca disponible para asignar a productos'),(2,'Inactivo','Marca deshabilitada, no asignable a nuevos productos'),(3,'Pendiente','Marca en espera de aprobación para su uso'),(4,'Suspendida','Marca bloqueada temporalmente');
/*!40000 ALTER TABLE `estado_marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_producto`
--

DROP TABLE IF EXISTS `estado_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_producto` (
  `id_estado_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_estado_producto`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_producto`
--

LOCK TABLES `estado_producto` WRITE;
/*!40000 ALTER TABLE `estado_producto` DISABLE KEYS */;
INSERT INTO `estado_producto` VALUES (1,'Disponible','Producto disponible para venta normal'),(2,'Inactivo','Producto temporalmente deshabilitado'),(3,'Agotado','Sin stock disponible'),(4,'Descontinuado','Ya no se maneja este producto'),(5,'Suspendido','Suspendido por problemas de calidad/proveedor'),(6,'Vencido','Producto con fecha de vencimiento expirada'),(7,'En Promocion','Producto en oferta especial'),(8,'Pendiente','En proceso de activación/aprobación'),(9,'Retirado','Retirado del mercado'),(10,'Estacional','Disponible solo en ciertas épocas'),(11,'Preventa','Disponible para reserva, aún no llegó'),(12,'Dañado','Producto con daños físicos'),(13,'Bajo Stock','Producto con bajo stock');
/*!40000 ALTER TABLE `estado_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_proveedor`
--

DROP TABLE IF EXISTS `estado_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_proveedor` (
  `id_estado_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_estado_proveedor`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_proveedor`
--

LOCK TABLES `estado_proveedor` WRITE;
/*!40000 ALTER TABLE `estado_proveedor` DISABLE KEYS */;
INSERT INTO `estado_proveedor` VALUES (1,'Activo','Proveedor activo con operaciones normales'),(2,'Inactivo','Proveedor temporalmente deshabilitado'),(3,'Suspendido','Suspendido por incumplimientos'),(4,'Bloqueado','Bloqueado por problemas legales/financieros'),(5,'Pendiente','En proceso de aprobación/homologación'),(6,'En Prueba','Período de prueba comercial'),(7,'Contingencia','Proveedor de respaldo/emergencia'),(8,'En Liquidacion','En proceso de cierre comercial'),(9,'Terminado','Relación comercial terminada'),(10,'Estacional','Proveedor solo en ciertas temporadas');
/*!40000 ALTER TABLE `estado_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_usuario`
--

DROP TABLE IF EXISTS `estado_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_usuario` (
  `id_estado_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_estado_usuario`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_usuario`
--

LOCK TABLES `estado_usuario` WRITE;
/*!40000 ALTER TABLE `estado_usuario` DISABLE KEYS */;
INSERT INTO `estado_usuario` VALUES (1,'Activo','Usuario con acceso completo al sistema'),(2,'Inactivo','Usuario temporalmente deshabilitado'),(3,'Bloqueado','Bloqueado por intentos fallidos de login'),(4,'Suspendido','Suspendido por violación de políticas'),(5,'Pendiente','Esperando activación/aprobación'),(6,'Expirado','Cuenta expirada, necesita renovación'),(7,'Vacaciones','Usuario en período de vacaciones'),(8,'Retirado','Ex-empleado, cuenta cerrada'),(9,'Temporal','Acceso temporal limitado'),(10,'Prueba','Usuario de prueba/demostración');
/*!40000 ALTER TABLE `estado_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_operaciones`
--

DROP TABLE IF EXISTS `historial_operaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_operaciones` (
  `id_historial_operaciones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_operacion` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_usuarios` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_historial_operaciones`),
  KEY `FK_historial_operaciones_usuarios` (`id_usuarios`),
  CONSTRAINT `FK_historial_operaciones_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_operaciones`
--

LOCK TABLES `historial_operaciones` WRITE;
/*!40000 ALTER TABLE `historial_operaciones` DISABLE KEYS */;
INSERT INTO `historial_operaciones` VALUES (228,'Compra','Se registró una nueva compra','2025-10-01 02:21:13',1030533364),(229,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:21:13',NULL),(230,'Compra','Se registró una nueva compra','2025-10-01 02:21:22',1030533364),(231,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:21:22',NULL),(232,'Compra','Se registró una nueva compra','2025-10-01 02:21:55',1030533364),(233,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:21:55',NULL),(234,'Compra','Se registró una nueva compra','2025-10-01 02:22:28',1030533364),(235,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:22:28',NULL),(236,'Compra','Se registró una nueva compra','2025-10-01 02:22:39',1030533364),(237,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:22:39',NULL),(238,'Compra','Se registró una nueva compra','2025-10-01 02:23:02',1030533364),(239,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:23:02',NULL),(240,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:28:52',NULL),(241,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:29:02',NULL),(242,'Compra','Se registró una nueva compra','2025-10-01 02:30:25',1030533364),(243,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:30:25',NULL),(244,'Compra','Se registró una nueva compra','2025-10-01 02:30:41',1030533364),(245,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:30:41',NULL),(246,'Compra','Se registró una nueva compra','2025-10-01 02:31:42',1030533364),(247,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:31:42',NULL),(248,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:31:42',NULL),(249,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:31:42',NULL),(250,'Compra','Se registró una nueva compra','2025-10-01 02:32:47',1030533364),(251,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:32:47',NULL),(252,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:32:47',NULL),(253,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:32:47',NULL),(254,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:32:47',NULL),(255,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:32:47',NULL),(256,'Compra','Se registró una nueva compra','2025-10-01 02:33:41',1030533364),(257,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:41',NULL),(258,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:41',NULL),(259,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:41',NULL),(260,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:41',NULL),(261,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:55',NULL),(262,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:33:59',NULL),(263,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:03',NULL),(264,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:06',NULL),(265,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:10',NULL),(266,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:13',NULL),(267,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:16',NULL),(268,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:19',NULL),(269,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:25',NULL),(270,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:28',NULL),(271,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:32',NULL),(272,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:34:35',NULL),(273,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:09',NULL),(274,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:14',NULL),(275,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:21',NULL),(276,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:25',NULL),(277,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:28',NULL),(278,'Venta','Se registró una nueva venta','2025-10-01 02:35:51',1030533364),(279,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:35:51',NULL),(280,'Venta','Se registró una nueva venta','2025-10-01 02:36:14',1030533364),(281,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:36:14',NULL),(282,'Venta','Se registró una nueva venta','2025-10-01 02:36:35',1030533364),(283,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:36:35',NULL),(284,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:36:35',NULL),(285,'Venta','Se registró una nueva venta','2025-10-01 02:37:02',1030533364),(286,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:37:02',NULL),(287,'Actualización Producto','Se actualizó un producto existente','2025-10-01 02:37:02',NULL);
/*!40000 ALTER TABLE `historial_operaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca` (
  `id_marca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_estado_marca` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_marca`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `FK_marca_estado` (`id_estado_marca`),
  CONSTRAINT `FK_marca_estado` FOREIGN KEY (`id_estado_marca`) REFERENCES `estado_marca` (`id_estado_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (7,'Alpina','Marca colombiana de productos lácteos, postres y bebidas.',1),(8,'Zenú','Marca líder en carnes frías, embutidos y alimentos enlatados.',1),(9,'Fruco','Reconocida por sus salsas, mayonesas y aderezos.',1),(10,'Saltín Noel','Galletas de soda tradicionales, un clásico en los hogares colombianos.',1),(11,'Sello Rojo','Popular marca de café molido y en grano de alta calidad.',1),(12,'Margarina La Fina','Margarina de uso común para cocinar y untar.',1),(13,'Doria','Líder en el mercado de pastas alimenticias en Colombia.',1),(14,'Arroz Diana','Una de las marcas de arroz más consumidas en el país.',1),(15,'El Rey','Marca especializada en condimentos, especias y sazonadores.',1),(16,'Fabuloso','Limpiadores multiusos y desinfectantes para el hogar.',1),(17,'Axion','Lavaloza en crema y líquido para la limpieza de la vajilla.',1),(18,'Colgate','Marca líder en cuidado oral, incluyendo cremas dentales y cepillos.',1),(19,'Protex','Jabones de tocador con propiedades antibacteriales.',1),(20,'Savital','Línea de productos para el cuidado del cabello a base de sábila.',1),(21,'Nosotras','Productos de protección e higiene femenina.',1),(22,'Pequeñín','Pañales y productos para el cuidado de los bebés.',1),(23,'Coca-Cola','La marca de gaseosa más reconocida a nivel mundial.',1),(24,'Milo','Bebida en polvo a base de malta y chocolate.',1),(25,'Tosh','Línea de galletas, snacks y bebidas enfocada en el bienestar.',1),(26,'Jet','Chocolatinas y productos de chocolate de la Compañía Nacional de Chocolates.',1);
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_productos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `id_categorias` int(10) unsigned DEFAULT NULL,
  `id_proveedores` int(10) unsigned DEFAULT NULL,
  `id_estado_producto` int(10) unsigned DEFAULT NULL,
  `id_marca` int(10) unsigned DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_proveedores_contingencia` int(10) unsigned DEFAULT NULL,
  `act_stock` datetime DEFAULT NULL,
  `id_usuarios` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_productos`),
  KEY `FK_productos_categorias` (`id_categorias`),
  KEY `FK_productos_proveedores` (`id_proveedores`),
  KEY `FK_productos_marca` (`id_marca`),
  KEY `FK_productos_estado` (`id_estado_producto`),
  KEY `FK_productos_proveedores_contigencia` (`id_proveedores_contingencia`),
  KEY `FK_productos_usuarios` (`id_usuarios`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id_categorias`),
  CONSTRAINT `FK_productos_estado` FOREIGN KEY (`id_estado_producto`) REFERENCES `estado_producto` (`id_estado_producto`),
  CONSTRAINT `FK_productos_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  CONSTRAINT `FK_productos_proveedores` FOREIGN KEY (`id_proveedores`) REFERENCES `proveedores` (`id_proveedores`),
  CONSTRAINT `FK_productos_proveedores_contigencia` FOREIGN KEY (`id_proveedores_contingencia`) REFERENCES `proveedores` (`id_proveedores`),
  CONSTRAINT `FK_productos_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (63,'Leche Entera Alpina Bolsa x 1 Litro',3200.00,4100.00,1,29,35,13,7,'Leche entera UHT en bolsa, ideal para toda la familia.',NULL,NULL,'2025-10-01 02:33:55',NULL),(64,'Yogur Alpina con Melocotón Vaso x 150g',1800.00,2500.00,1,29,35,13,7,'Yogur cremoso con trozos de melocotón natural.',NULL,NULL,'2025-10-01 02:33:59',NULL),(65,'Salchicha Ranchera Zenú Paquete x 8 Unidades',7500.00,9200.00,1,42,39,13,8,'Salchicha tipo premium con el sabor ahumado característico.',NULL,NULL,'2025-10-01 02:34:03',NULL),(66,'Pechuga de Pollo Entera sin Piel (Aprox. 1kg)',12000.00,15500.00,35,30,45,1,8,'Pechuga de pollo fresca, ideal para asar o desmechar. El precio final varía según el peso.',NULL,NULL,'2025-10-01 02:32:47',NULL),(67,'Mayonesa Fruco Doypack x 475g',8900.00,11000.00,15,44,42,1,9,'Aderezo cremoso a base de huevo, ideal para ensaladas y sándwiches.',NULL,NULL,'2025-10-01 02:31:42',NULL),(68,'Galletas Saltín Noel Taco x 3 Unidades',2800.00,3600.00,1,36,39,13,10,'Tradicionales galletas de soda, crocantes y versátiles.',NULL,NULL,'2025-10-01 02:34:06',NULL),(69,'Café Sello Rojo Tradicional Molido x 500g',14500.00,17800.00,1,43,39,13,11,'Café tostado y molido de la selección de granos colombianos.',NULL,NULL,'2025-10-01 02:34:10',NULL),(70,'Margarina La Fina Barra x 125g',1500.00,2100.00,1,29,52,13,12,'Margarina vegetal ideal para repostería y preparaciones de cocina.',NULL,NULL,'2025-10-01 02:34:13',NULL),(71,'Spaghetti Doria Paquete x 500g',3100.00,4000.00,0,33,39,3,13,'Pasta larga de sémola de trigo duro, perfecta para cualquier salsa.',NULL,NULL,'2025-10-01 02:36:35',NULL),(72,'Arroz Diana Fortificado Bolsa x 500 gr',2500.00,3200.00,150,33,49,1,14,'Arroz blanco de grano largo, fortificado con vitaminas y minerales.',NULL,NULL,'2025-10-01 02:22:28',NULL),(73,'Color El Rey Sobre x 10g',800.00,1200.00,1,33,39,13,15,'Condimento en polvo para dar color y un ligero sabor a las comidas.',NULL,NULL,'2025-10-01 02:34:19',NULL),(102,'Limpiador Multiusos Fabuloso Lavanda 1 Litro',5500.00,7200.00,28,38,44,1,16,'Limpiador desinfectante con aroma a lavanda para pisos y superficies.',NULL,NULL,'2025-10-01 02:33:41',NULL),(103,'Limpiador Multiusos Fabuloso Lavanda 1 Litro',5500.00,7200.00,45,38,44,1,16,'Limpiador desinfectante con aroma a lavanda para pisos y superficies.',NULL,NULL,'2025-10-01 02:33:41',NULL),(104,'Lavaloza Líquido Axion Limón x 500ml',6800.00,8500.00,20,38,45,1,17,'Lavaplatos líquido concentrado con poder arranca grasa y aroma a limón.',NULL,NULL,'2025-10-01 02:32:47',NULL),(105,'Crema Dental Colgate Triple Acción x 100ml',5200.00,6900.00,23,37,44,1,18,'Crema dental con triple beneficio: protección anticaries, extra blancura y aliento fresco.',NULL,NULL,'2025-10-01 02:33:41',NULL),(106,'Jabón de Baño Protex Avena x 120g',2900.00,3800.00,64,37,44,1,19,'Jabón antibacterial con avena para una piel suave y protegida.',NULL,NULL,'2025-10-01 02:37:02',NULL),(107,'Shampoo Savital con Sábila y Keratina x 550ml',13500.00,16800.00,45,37,42,1,20,'Shampoo para el cuidado del cabello, dejándolo suave y brillante.',NULL,NULL,'2025-10-01 02:31:42',NULL),(108,'Toallas Higiénicas Nosotras Normal Paquete x 10',4500.00,5800.00,10,37,43,13,21,'Toallas de flujo normal con cubierta suave para mayor comodidad.',NULL,NULL,'2025-10-01 02:21:55',NULL),(109,'Pañales Pequeñín Etapa 3 Paquete x 30',25000.00,31000.00,30,40,43,1,22,'Pañales absorbentes para bebés de 7 a 11 kg.',NULL,NULL,'2025-10-01 02:36:35',NULL),(110,'Gaseosa Coca-Cola Sabor Original x 1.5 Litros',3800.00,4900.00,0,34,36,3,23,'Bebida carbonatada refrescante con sabor original.',NULL,NULL,'2025-10-01 02:35:51',NULL),(111,'Bebida Achocolatada Milo en Polvo x 400g',11500.00,14500.00,0,34,39,3,24,'Mezcla en polvo para preparar bebida de malta y chocolate, enriquecida con vitaminas.',NULL,NULL,'2025-10-01 02:36:14',NULL),(112,'Galletas Tosh Miel y Avena Paquete x 6',4200.00,5500.00,1,36,39,13,25,'Galletas integrales con avena en hojuelas y un toque de miel.',NULL,NULL,'2025-10-01 02:34:32',NULL),(113,'Chocolatina Jet Tradicional x 12g',500.00,800.00,1,36,39,13,26,'Clásica chocolatina de leche, ideal para un snack rápido.',NULL,NULL,'2025-10-01 02:34:35',NULL),(114,'Huevos AA Rojos Cubeta x 30 Unidades',16000.00,21000.00,50,29,45,1,7,'Huevos frescos de gallina, categoría AA.',NULL,NULL,'2025-10-01 02:32:47',NULL),(115,'Aguardiente Antioqueño Tapa Azul Botella x 750ml',35000.00,43000.00,45,41,40,1,15,'Aguardiente tradicional sin azúcar, producto insignia de la FLA.',NULL,NULL,'2025-10-01 02:22:39',NULL),(116,'Lomo de Cerdo Entero (Aprox. 1kg)',18000.00,24000.00,35,30,45,1,8,'Corte de cerdo magro y tierno, ideal para hornear o freír.',NULL,NULL,'2025-10-01 02:32:47',NULL),(117,'Banano Criollo por Kilo',2000.00,2800.00,60,31,45,1,9,'Fruta fresca, precio por kilogramo.',NULL,NULL,'2025-10-01 02:32:47',NULL),(118,'Papas Fritas Pepsico Sabor Natural x 110g',3500.00,4600.00,1,36,41,13,25,'Hojuelas de papa fritas con sal, crocantes y deliciosas.',NULL,NULL,'2025-10-01 02:35:09',NULL),(119,'Azúcar Blanca Incauca Bolsa x 1kg',4000.00,5100.00,0,33,48,3,13,'Azúcar de caña refinada, ideal para endulzar bebidas y postres.',NULL,NULL,'2025-10-01 02:37:02',NULL),(120,'Ponqué Gala Ramo Tradicional',4500.00,5900.00,30,32,47,1,10,'Pequeño ponqué individual con cubierta sabor a chocolate.',NULL,NULL,'2025-10-01 02:35:21',NULL),(121,'Cerveza Poker Lata x 6 Unidades',12500.00,15000.00,1,41,37,13,23,'Cerveza tipo lager, una de las más populares en Colombia.',NULL,NULL,'2025-10-01 02:35:25',NULL),(122,'Atún Van Camps en Aceite Lata x 160g',5500.00,7000.00,1,33,39,13,8,'Lomos de atún en aceite vegetal, listos para consumir.',NULL,NULL,'2025-10-01 02:35:28',NULL),(123,'Queso Campesino Colanta Bloque x 250g',6500.00,8200.00,5,29,46,13,7,'Queso fresco y bajo en sal, ideal para asar o acompañar.',NULL,NULL,'2025-10-01 02:30:41',NULL),(124,'Salsa de Tomate Fruco Doypack x 200g',2300.00,3100.00,30,44,42,1,9,'Salsa de tomate tradicional para acompañar todo tipo de comidas.',NULL,NULL,'2025-10-01 02:31:42',NULL),(125,'Chocolate Corona para Mesa Barra x 500g',8500.00,10500.00,20,43,39,1,26,'Pastillas de chocolate amargo para preparar bebida caliente.',NULL,NULL,'2025-10-01 02:21:22',NULL),(126,'Frijol Cargamanto Goya Bolsa x 500g',5800.00,7500.00,70,33,53,1,14,'Frijol seco de la variedad cargamanto, base de la bandeja paisa.',NULL,NULL,'2025-10-01 02:23:02',NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER actualizar_fecha_alta
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
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trg_after_insert_productos
AFTER INSERT ON productos
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Creación Producto', 'Se registró un nuevo producto', NOW(), NEW.id_usuarios);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER actualizar_stock
BEFORE UPDATE ON productos
FOR EACH ROW
BEGIN
    IF NEW.stock != OLD.stock AND NEW.stock IS NOT NULL THEN
        SET NEW.act_stock = NOW();
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER actualizar_estado_stock
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
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER actualizar_fecha_alta_update
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
    IF NEW.id_proveedores IS NOT NULL THEN
        UPDATE proveedores 
        SET fecha_alta = NOW() 
        WHERE id_proveedores = NEW.id_proveedores 
        AND fecha_alta IS NULL;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trg_after_update_productos
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
	INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios)
	VALUES('Actualización Producto', 'Se actualizó un producto existente', NOW(), NEW.id_usuarios);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id_proveedores` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `nit` varchar(30) NOT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `id_estado_proveedor` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_proveedores`),
  UNIQUE KEY `nombre` (`nombre`),
  UNIQUE KEY `nit` (`nit`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `contacto` (`contacto`),
  KEY `FK_proveedor_estado` (`id_estado_proveedor`),
  CONSTRAINT `FK_proveedor_estado` FOREIGN KEY (`id_estado_proveedor`) REFERENCES `estado_proveedor` (`id_estado_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (34,'Juan Valdez','servicioalcliente@juanvaldezcafe.com','6013269200','Procafecol S.A.','830097912-1',NULL,NULL,'2025-10-01 01:12:03',1),(35,'Alpina','servicioalconsumidor@alpina.com','6014238000','Alpina Productos Alimenticios S.A.','860025900-2','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(36,'Postobón','servicioalcliente@postobon.com.co','018000515959','Postobón S.A.','890903939-6','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(37,'Bavaria','atencionalcliente@bavaria.co','6016389000','Bavaria S.A.','860005224-6','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(38,'Colombina','servicioalcliente@colombina.com','018000931111','Colombina S.A.','890301127-1',NULL,NULL,'2025-10-01 01:12:03',1),(39,'Grupo Nutresa','atencion.consumidor@nutresa.com','018000516688','Grupo Nutresa S.A.','890900290-3','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(40,'Fábrica de Licores de Antioquia','contactenos@fla.com.co','6043557000','Fábrica de Licores y Alcoholes de Antioquia E.I.C.E.','890900287-1','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(41,'Pepsico Alimentos Colombia','servicioalcliente.colombia@pepsico.com','018000911007','Pepsico Alimentos Colombia Ltda.','860022467-1','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(42,'Unilever','consumidor.co@unilever.com','6017438100','Unilever Andina Colombia Ltda.','860004480-1','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(43,'Kimberly-Clark','servicioalconsumidor.col@kcc.com','018000512626','Colombiana Kimberly Colpapel S.A.','860001604-1','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(44,'Procter & Gamble','contacto.co@pg.com','018000915334','Procter & Gamble Colombia Ltda.','860029245-5','2025-10-01 01:46:23',NULL,'2025-10-01 01:12:03',1),(45,'Grupo Éxito','servicioalcliente@grupo-exito.com','018000428800','Almacenes Éxito S.A.','890900608-9','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(46,'Colanta','servicioalasociado@colanta.com.co','6044455555','Cooperativa Colanta','890901358-1','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(47,'Ramo','servicioalcliente@ramo.com.co','6014375200','Productos Ramo S.A.','860002551-7','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(48,'Incauca','info@incauca.com','6024185100','Incauca S.A.S.','890306161-5','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1),(49,'Diana Corporación','sac@dianacor.com','018000914441','Diana Corporación S.A.S.','860002251-5','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(50,'Harina Tres Castillos','servicioalcliente@pastascomarrico.com','6053617000','Harina Tres Castillos S.A.S.','890100253-1',NULL,NULL,'2025-10-01 01:12:03',1),(51,'Aldor','contacto@aldor.com.co','6026875100','Aldor S.A.S.','805011700-1',NULL,NULL,'2025-10-01 01:12:03',1),(52,'Team Foods','servicioalcliente@teamfoods.com','6012988888','Team Foods Colombia S.A.','800201111-2','2025-10-01 01:45:13',NULL,'2025-10-01 01:12:03',1),(53,'Goya para Colombia','info@goya.com.co','6017443131','Goya para Colombia S.A.S.','900449521-1','2025-10-01 01:47:09',NULL,'2025-10-01 01:12:03',1);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER asignar_fecha_ingreso
BEFORE INSERT ON proveedores
FOR EACH ROW
BEGIN
    SET NEW.fecha_ingreso = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER manejar_fecha_baja
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
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `proveedores_con_contador`
--

DROP TABLE IF EXISTS `proveedores_con_contador`;
/*!50001 DROP VIEW IF EXISTS `proveedores_con_contador`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `proveedores_con_contador` AS SELECT 
 1 AS `id_proveedores`,
 1 AS `nombre`,
 1 AS `contacto`,
 1 AS `empresa`,
 1 AS `nit`,
 1 AS `fecha_ingreso`,
 1 AS `fecha_alta`,
 1 AS `fecha_baja`,
 1 AS `estado`,
 1 AS `cantidad_productos`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_roles` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_roles`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','Rol que puede ejecutar cualquier acción en el sistema'),(2,'Supervisor','Supervisar operaciones, generar reportes, gestionar stock crítico'),(3,'Vendedor','Procesar ventas, consultar precios y stock'),(4,'Bodega/Almacen','Control de inventario, recepción de mercancía, gestión de proveedores y categorias');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'Cédula de Ciudadanía'),(3,'Cédula de Extranjería'),(4,'Registro Civil de Nacimiento'),(2,'Tarjeta de Identidad');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuarios` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `id_roles` int(10) unsigned DEFAULT NULL,
  `id_estado_usuario` int(10) unsigned DEFAULT NULL,
  `id_tipo_documento` int(10) unsigned DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefono` (`telefono`),
  KEY `FK_usuarios_roles` (`id_roles`),
  KEY `FK_usuarios_tipo_documento` (`id_tipo_documento`),
  KEY `FK_usuarios_estado` (`id_estado_usuario`),
  CONSTRAINT `FK_usuarios_estado` FOREIGN KEY (`id_estado_usuario`) REFERENCES `estado_usuario` (`id_estado_usuario`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`),
  CONSTRAINT `FK_usuarios_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (52313194,'Supervisor','SGSP','supervisor@gmail.com','3103110309','$2y$10$ppcsmPWglQxvwbY6iPQcx.MTposm7b9uRAFHfjQ4aT6cAQBO3eBGe',NULL,NULL,2,1,1,NULL),(80067922,'Vendedor','SGSP','vendedor@gmail.com','3102963881','$2y$10$MyNjagfwCT5E8zB7VIJBE.ooNt5TqRYsR8vaumzEbCFjr9xl3lNNG',NULL,NULL,3,1,3,NULL),(1030533364,'Johan Felipe','Garcia Salazar','fgfernan2508@gmail.com','3107847573','$2y$10$iYhjUUNMf0i/qUeCVN2cHejH7/AS4eV/4E3h2P36ktOarEQTbfj/6',NULL,NULL,1,1,1,NULL),(1234567890,'Carlos','Castro','carlos.castro@dicocolombia.com','3186056711','$2y$10$2CRHXcNChEC43RWVMoCgCuNmzTagmGhF6YJ1gliyibNEsaAa334IG',NULL,NULL,1,1,1,NULL),(1567890237,'Bodega/Almacen','SGSP','bodega@gmail.com','3507722045','$2y$10$ZmrnshwrSDnWvUVlM04dMuSS.pmvlhfNgjnGX33sdCT8OqRoI7OIG',NULL,NULL,4,1,1,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_ventas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuarios` int(10) unsigned DEFAULT NULL,
  `cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `FK_ventas_usuarios` (`id_usuarios`),
  CONSTRAINT `FK_ventas_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (30,'2025-10-01 02:35:51',5831.00,1030533364,'Carlos Castro'),(31,'2025-10-01 02:36:14',17255.00,1030533364,'Jerson Salazar'),(32,'2025-10-01 02:36:35',189210.00,1030533364,'Enrique Garcia'),(33,'2025-10-01 02:37:02',19635.00,1030533364,'Marcela Salazar');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER asignar_fecha_hora_V
BEFORE INSERT ON ventas
FOR EACH ROW
BEGIN
    SET NEW.fecha_hora = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trg_after_insert_ventas
AFTER INSERT ON ventas
FOR EACH ROW
BEGIN
INSERT INTO historial_operaciones(tipo_operacion, descripcion, fecha_hora, id_usuarios) 
VALUES ('Venta', 'Se registró una nueva venta', NEW.fecha_hora, NEW.id_usuarios);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'sgsp'
--

--
-- Dumping routines for database 'sgsp'
--

--
-- Final view structure for view `categorias_con_contador`
--

/*!50001 DROP VIEW IF EXISTS `categorias_con_contador`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `categorias_con_contador` AS select `c`.`id_categorias` AS `id_categorias`,`c`.`nombre` AS `nombre`,`c`.`descripcion` AS `descripcion`,`c`.`id_estado_categoria` AS `estado`,count(`p`.`id_productos`) AS `cantidad_productos` from (`categorias` `c` left join `productos` `p` on(`c`.`id_categorias` = `p`.`id_categorias`)) group by `c`.`id_categorias`,`c`.`nombre`,`c`.`descripcion`,`c`.`id_estado_categoria` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `proveedores_con_contador`
--

/*!50001 DROP VIEW IF EXISTS `proveedores_con_contador`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `proveedores_con_contador` AS select `p`.`id_proveedores` AS `id_proveedores`,`p`.`nombre` AS `nombre`,`p`.`contacto` AS `contacto`,`p`.`empresa` AS `empresa`,`p`.`nit` AS `nit`,`p`.`fecha_ingreso` AS `fecha_ingreso`,`p`.`fecha_alta` AS `fecha_alta`,`p`.`fecha_baja` AS `fecha_baja`,`p`.`id_estado_proveedor` AS `estado`,count(`pr`.`id_productos`) AS `cantidad_productos` from (`proveedores` `p` left join `productos` `pr` on(`p`.`id_proveedores` = `pr`.`id_proveedores` or `p`.`id_proveedores` = `pr`.`id_proveedores_contingencia`)) group by `p`.`id_proveedores`,`p`.`nombre`,`p`.`contacto`,`p`.`empresa`,`p`.`nit`,`p`.`fecha_ingreso`,`p`.`fecha_alta`,`p`.`fecha_baja`,`p`.`id_estado_proveedor` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-01  2:55:25

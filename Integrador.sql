-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para integrador
CREATE DATABASE IF NOT EXISTS `integrador_` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `integrador_`;

-- Volcando estructura para tabla integrador.cobcabeceracobrar
CREATE TABLE IF NOT EXISTS `cobcabeceracobrar` (
  `ccbId` int(11) NOT NULL AUTO_INCREMENT,
  `vcvId` int(11) DEFAULT NULL,
  `ccbValor` float DEFAULT NULL,
  `ccbNumCta` int(11) DEFAULT NULL,
  `ccbValCta` float unsigned DEFAULT NULL,
  `ccbSaldo` float DEFAULT NULL,
  `ccbFecIni` date DEFAULT NULL,
  `ccbFecReg` date DEFAULT NULL,
  `ccbFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `ccbEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ccbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.cobcliente
CREATE TABLE IF NOT EXISTS `cobcliente` (
  `cliId` int(11) NOT NULL AUTO_INCREMENT,
  `cliCedula` varchar(13) DEFAULT NULL,
  `cliNombre` varchar(50) DEFAULT NULL,
  `cliDireccion` varchar(80) NOT NULL,
  `cliTelefono` varchar(25) NOT NULL,
  `ciuId` varchar(50) NOT NULL,
  `prvId` varchar(50) NOT NULL,
  `cliEmail` varchar(80) NOT NULL,
  `cliCupo` decimal(10,2) NOT NULL,
  `cliCupSal` decimal(10,2) NOT NULL,
  `cliFecReg` datetime NOT NULL,
  `cliFecMod` datetime NOT NULL,
  `usuIdCre` int(11) NOT NULL DEFAULT '0',
  `usuIdMod` int(11) NOT NULL DEFAULT '0',
  `cliEstado` bit(1) NOT NULL,
  PRIMARY KEY (`cliId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.cobdetallecobrar
CREATE TABLE IF NOT EXISTS `cobdetallecobrar` (
  `dcbId` int(11) NOT NULL AUTO_INCREMENT,
  `ccbId` int(11) DEFAULT NULL,
  `dcbFecPag` date DEFAULT NULL,
  `dcbValPag` float DEFAULT NULL,
  `dcbFecAbo` date DEFAULT NULL,
  `dcbEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`dcbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comarticulo
CREATE TABLE IF NOT EXISTS `comarticulo` (
  `artId` int(11) NOT NULL AUTO_INCREMENT,
  `artCodBar` int(11) NOT NULL DEFAULT '0',
  `artDescripcion` varchar(50) NOT NULL,
  `artDetalle` varchar(80) NOT NULL,
  `modId` int(11) NOT NULL DEFAULT '0',
  `tipId` int(11) NOT NULL,
  `marId` int(11) NOT NULL DEFAULT '0',
  `preId` int(11) NOT NULL DEFAULT '0',
  `catId` int(11) NOT NULL DEFAULT '0',
  `gruId` int(11) NOT NULL DEFAULT '0',
  `proId` int(11) NOT NULL DEFAULT '0',
  `artStock` int(11) NOT NULL DEFAULT '0',
  `artStoMin` int(11) NOT NULL DEFAULT '0',
  `artStoMax` int(11) NOT NULL DEFAULT '0',
  `artPreCos` decimal(10,2) NOT NULL DEFAULT '0.00',
  `artPreCom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `artPvp` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ubiId` int(11) unsigned zerofill NOT NULL DEFAULT '00000000000',
  `artImagen` varchar(100) NOT NULL,
  `artIva` bit(1) NOT NULL,
  `artFecCad` date NOT NULL,
  `artObservacion` varchar(150) NOT NULL,
  `artFecReg` datetime NOT NULL,
  `artFecMod` datetime NOT NULL,
  `artUsuIdMod` int(11) NOT NULL DEFAULT '0',
  `artUsuIdReg` int(11) NOT NULL DEFAULT '0',
  `artEstado` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`artId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comcabcompra
CREATE TABLE IF NOT EXISTS `comcabcompra` (
  `ccoId` int(11) NOT NULL AUTO_INCREMENT,
  `proId` int(11) NOT NULL DEFAULT '0',
  `ccoFecCom` datetime NOT NULL,
  `ccoReferencia` varchar(20) NOT NULL,
  `plcTipPag` varchar(20) NOT NULL DEFAULT '0',
  `plcTipCom` varchar(20) NOT NULL,
  `ccoSubtotal` decimal(10,2) NOT NULL,
  `ccoDescuento` decimal(10,2) NOT NULL,
  `ccoIva` decimal(10,2) NOT NULL,
  `ccoTotal` int(11) NOT NULL,
  `ccoEstado` bit(1) NOT NULL,
  PRIMARY KEY (`ccoId`)
) ENGINE=MyISAM AUTO_INCREMENT=121212122 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comciudad
CREATE TABLE IF NOT EXISTS `comciudad` (
  `ciuId` int(11) DEFAULT NULL,
  `ciuDescripcion` varchar(50) DEFAULT NULL,
  `ciuFecReg` datetime DEFAULT NULL,
  `ciuFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `ciuEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comdetcompra
CREATE TABLE IF NOT EXISTS `comdetcompra` (
  `dcoId` int(11) NOT NULL AUTO_INCREMENT,
  `ccoId` int(11) NOT NULL DEFAULT '0',
  `artId` int(11) NOT NULL DEFAULT '0',
  `dcoPreCom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dcoCantidad` int(11) NOT NULL DEFAULT '0',
  `dcoSubtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`dcoId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.commarca
CREATE TABLE IF NOT EXISTS `commarca` (
  `marId` int(11) DEFAULT NULL,
  `marDescripcion` varchar(50) DEFAULT NULL,
  `marFecReg` datetime DEFAULT NULL,
  `marFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `marEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.commodelo
CREATE TABLE IF NOT EXISTS `commodelo` (
  `modId` int(11) NOT NULL AUTO_INCREMENT,
  `modDetalle` varchar(50) DEFAULT NULL,
  `modFecReg` datetime DEFAULT NULL,
  `modFecMod` datetime DEFAULT NULL,
  `UsuIdCre` int(11) DEFAULT NULL,
  `UsuIdMod` int(11) DEFAULT NULL,
  `modEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`modId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.compresentacion
CREATE TABLE IF NOT EXISTS `compresentacion` (
  `preId` int(11) DEFAULT NULL,
  `preDescripcion` varchar(50) DEFAULT NULL,
  `preFecReg` datetime DEFAULT NULL,
  `preFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `preEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comproveedor
CREATE TABLE IF NOT EXISTS `comproveedor` (
  `proId` int(11) NOT NULL AUTO_INCREMENT,
  `proRuc` varchar(13) DEFAULT NULL,
  `proRepresentante` varchar(80) DEFAULT NULL,
  `proEmpresa` varchar(80) NOT NULL,
  `proDireccion` varchar(80) NOT NULL,
  `proTelefono` varchar(25) NOT NULL,
  `ciuId` varchar(50) NOT NULL,
  `prvId` varchar(50) NOT NULL,
  `proEmail` varchar(80) NOT NULL,
  `proFecReg` datetime NOT NULL,
  `proFecMod` datetime NOT NULL,
  `usuIdCre` int(11) NOT NULL DEFAULT '0',
  `usuIdMod` int(11) NOT NULL DEFAULT '0',
  `proEstado` bit(1) NOT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comprovincia
CREATE TABLE IF NOT EXISTS `comprovincia` (
  `prvId` int(11) DEFAULT NULL,
  `prvDescripcion` varchar(50) DEFAULT NULL,
  `prvFecReg` datetime DEFAULT NULL,
  `prvFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `prvEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comtipo
CREATE TABLE IF NOT EXISTS `comtipo` (
  `tipId` int(11) DEFAULT NULL,
  `tipDescripcion` varchar(50) DEFAULT NULL,
  `tipFecReg` datetime DEFAULT NULL,
  `tipFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `tipEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.comubicacion
CREATE TABLE IF NOT EXISTS `comubicacion` (
  `ubiId` int(11) DEFAULT NULL,
  `ubiDescripcion` varchar(50) DEFAULT NULL,
  `ubiFecReg` datetime DEFAULT NULL,
  `ubiFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `ubiEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.conauditoria
CREATE TABLE IF NOT EXISTS `conauditoria` (
  `audId` int(11) NOT NULL AUTO_INCREMENT,
  `audTabla` varchar(50) DEFAULT NULL,
  `audRegistroId` int(11) DEFAULT NULL,
  `audAccion` varchar(2) DEFAULT NULL,
  `audFecha` date DEFAULT NULL,
  `audHora` time DEFAULT NULL,
  `audEstacion` varchar(50) DEFAULT NULL,
  `usuId` int(11) DEFAULT NULL,
  PRIMARY KEY (`audId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.concablibro
CREATE TABLE IF NOT EXISTS `concablibro` (
  `clbId` int(11) NOT NULL AUTO_INCREMENT,
  `clbAnio` int(11) DEFAULT NULL,
  `clbIdEmpresa` int(11) DEFAULT NULL,
  `clbFecReg` datetime DEFAULT NULL,
  `clbFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `clbEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`clbId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.condetlibro
CREATE TABLE IF NOT EXISTS `condetlibro` (
  `dlbId` int(11) NOT NULL AUTO_INCREMENT,
  `glbId` int(11) DEFAULT NULL,
  `plcCuenta` varchar(50) DEFAULT NULL,
  `dlbDebe` float DEFAULT NULL,
  `dlbHaber` float DEFAULT NULL,
  PRIMARY KEY (`dlbId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.conempresa
CREATE TABLE IF NOT EXISTS `conempresa` (
  `eprId` int(11) NOT NULL AUTO_INCREMENT,
  `eprRazon` varchar(50) DEFAULT NULL,
  `eprRuc` varchar(50) DEFAULT NULL,
  `eprRepresentante` varchar(50) DEFAULT NULL,
  `eprContador` varchar(50) DEFAULT NULL,
  `eprDireccion` varchar(50) DEFAULT NULL,
  `eprFecReg` datetime DEFAULT NULL,
  `eprFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  PRIMARY KEY (`eprId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.conglosalibro
CREATE TABLE IF NOT EXISTS `conglosalibro` (
  `glbId` int(11) NOT NULL AUTO_INCREMENT,
  `clbId` int(11) NOT NULL,
  `glbFecha` datetime DEFAULT NULL,
  `glbGlosa` varchar(200) DEFAULT NULL,
  `glbFecReg` datetime DEFAULT NULL,
  `glbFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `glbEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`glbId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.conplccta
CREATE TABLE IF NOT EXISTS `conplccta` (
  `plcId` int(11) NOT NULL AUTO_INCREMENT,
  `plcDescripcion` varchar(50) DEFAULT NULL,
  `plcCuenta` varchar(50) DEFAULT NULL,
  `plcPadre` varchar(50) DEFAULT NULL,
  `plcEstVta` bit(1) DEFAULT NULL,
  `plcEstCom` bit(1) DEFAULT NULL,
  `plcFecReg` datetime DEFAULT NULL,
  `plcFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `plcEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`plcId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.devcabcom
CREATE TABLE IF NOT EXISTS `devcabcom` (
  `dccId` int(11) NOT NULL AUTO_INCREMENT,
  `ccoId` int(11) DEFAULT NULL,
  `dccValor` decimal(10,2) DEFAULT NULL,
  `dccIva` decimal(10,2) DEFAULT NULL,
  `dccTipDev` varchar(30) DEFAULT NULL,
  `dccMotivo` varchar(150) DEFAULT NULL,
  `dccFecReg` date DEFAULT NULL,
  `dccFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `dccEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`dccId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.devcabven
CREATE TABLE IF NOT EXISTS `devcabven` (
  `dcvId` int(11) NOT NULL AUTO_INCREMENT,
  `vcvId` int(11) DEFAULT NULL,
  `dcvValor` decimal(10,2) DEFAULT NULL,
  `dcvIva` decimal(10,2) DEFAULT NULL,
  `dcvTipDev` varchar(30) DEFAULT NULL,
  `dcvMotivo` varchar(150) DEFAULT NULL,
  `dcvFecReg` date DEFAULT NULL,
  `dcvFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `dcvEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`dcvId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.devdetcom
CREATE TABLE IF NOT EXISTS `devdetcom` (
  `ddcId` int(11) NOT NULL AUTO_INCREMENT,
  `dccId` int(11) NOT NULL DEFAULT '0',
  `artId` int(11) NOT NULL DEFAULT '0',
  `ddcPreCom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ddcCantidad` int(11) NOT NULL DEFAULT '0',
  `ddcCanDev` int(11) NOT NULL DEFAULT '0',
  `ddcSubtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ddcId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.devdetven
CREATE TABLE IF NOT EXISTS `devdetven` (
  `ddvId` int(11) NOT NULL AUTO_INCREMENT,
  `dcvId` int(11) NOT NULL DEFAULT '0',
  `artId` int(11) NOT NULL DEFAULT '0',
  `ddvPreVen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ddvCantidad` int(11) NOT NULL DEFAULT '0',
  `ddvCanDev` int(11) NOT NULL DEFAULT '0',
  `ddvSubtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ddvId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.nomprestamo
CREATE TABLE IF NOT EXISTS `nomprestamo` (
  `preId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL DEFAULT '0',
  `preTipo` varchar(50) NOT NULL DEFAULT '0',
  `preFecha` date NOT NULL,
  `preValor` int(11) NOT NULL DEFAULT '0',
  `preSaldo` decimal(10,0) NOT NULL DEFAULT '0',
  `preCuoPen` decimal(10,0) NOT NULL DEFAULT '0',
  `preNcoutas` int(11) NOT NULL DEFAULT '0',
  `preCuota` int(11) NOT NULL DEFAULT '0',
  `preFechaIni` date NOT NULL,
  `preEstado` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`preId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.nomrolrubros
CREATE TABLE IF NOT EXISTS `nomrolrubros` (
  `roId` int(11) NOT NULL AUTO_INCREMENT,
  `rolPeriodo` varchar(6) NOT NULL DEFAULT '0',
  `empId` int(11) NOT NULL DEFAULT '0',
  `AreId` int(11) DEFAULT NULL,
  `CrgId` int(11) NOT NULL DEFAULT '0',
  `ClaId` int(11) DEFAULT NULL,
  `rolSueldo` int(11) NOT NULL DEFAULT '0',
  `rolSueRol` int(11) NOT NULL DEFAULT '0',
  `rolSobretiempo` int(11) NOT NULL DEFAULT '0',
  `rolLunch` int(11) NOT NULL DEFAULT '0',
  `rolTransporte` int(11) NOT NULL DEFAULT '0',
  `rolBono` int(11) NOT NULL DEFAULT '0',
  `rolTotIng` decimal(10,0) NOT NULL DEFAULT '0',
  `rolIes` decimal(10,0) NOT NULL DEFAULT '0',
  `rolAnticipo` int(11) NOT NULL DEFAULT '0',
  `rolQuirografario` int(11) NOT NULL DEFAULT '0',
  `rolHipotecario` int(11) NOT NULL DEFAULT '0',
  `rolOtrosDescuentos` int(11) NOT NULL DEFAULT '0',
  `rolTotEgr` decimal(10,0) NOT NULL DEFAULT '0',
  `rolTotNet` int(11) NOT NULL DEFAULT '0',
  `rolFecReg` date DEFAULT NULL,
  `rolFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `rolEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`roId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.nomrubros
CREATE TABLE IF NOT EXISTS `nomrubros` (
  `rubId` int(11) DEFAULT NULL,
  `rubCodigo` varchar(6) DEFAULT NULL,
  `rubDescrip` varchar(50) DEFAULT NULL,
  `rubTipo` varchar(1) DEFAULT NULL,
  `rubValor` decimal(10,0) DEFAULT NULL,
  `rubFecReg` date DEFAULT NULL,
  `rubFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `rubEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.nomvacaciones
CREATE TABLE IF NOT EXISTS `nomvacaciones` (
  `vacId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL DEFAULT '0',
  `vacPeriodo` int(11) NOT NULL DEFAULT '0',
  `vacFecIng` date NOT NULL,
  `vacFecDes` date NOT NULL,
  `vacFecHas` date NOT NULL,
  `vacDiaGoz` int(11) NOT NULL DEFAULT '0',
  `vacFecReg` date DEFAULT NULL,
  `vacFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `vacEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`vacId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.pagcabecerapagar
CREATE TABLE IF NOT EXISTS `pagcabecerapagar` (
  `ccpId` int(11) NOT NULL AUTO_INCREMENT,
  `ccoId` int(11) DEFAULT NULL,
  `ccpValor` float DEFAULT NULL,
  `ccpNumCuo` int(11) DEFAULT NULL,
  `ccpValCuo` float unsigned DEFAULT NULL,
  `ccpSaldo` float DEFAULT NULL,
  `ccpFecIni` date DEFAULT NULL,
  `ccpEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ccpId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.pagdetallepagar
CREATE TABLE IF NOT EXISTS `pagdetallepagar` (
  `dcpId` int(11) NOT NULL AUTO_INCREMENT,
  `ccpId` int(11) DEFAULT NULL,
  `dcpFecPag` date DEFAULT NULL,
  `dcpValPag` float DEFAULT NULL,
  `dcpFecAbo` date DEFAULT NULL,
  `dcpEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`dcpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrharea
CREATE TABLE IF NOT EXISTS `rrharea` (
  `areId` int(11) DEFAULT NULL,
  `areDescripcion` varchar(50) DEFAULT NULL,
  `areFecReg` datetime DEFAULT NULL,
  `areFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `areEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhasistencia
CREATE TABLE IF NOT EXISTS `rrhasistencia` (
  `asiId` int(11) DEFAULT NULL,
  `empId` int(11) DEFAULT NULL,
  `asiFecha` date DEFAULT NULL,
  `asiHorEnt` time DEFAULT NULL,
  `asiHorIniLun` time DEFAULT NULL,
  `asiHorRegLun` time DEFAULT NULL,
  `asiHorSal` time DEFAULT NULL,
  `asiHorTra` time DEFAULT NULL,
  `asiHor50` time DEFAULT NULL,
  `asiHor100` time DEFAULT NULL,
  `asiFecReg` date DEFAULT NULL,
  `asiFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `asiEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhcargafamiliar
CREATE TABLE IF NOT EXISTS `rrhcargafamiliar` (
  `crgId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) DEFAULT NULL,
  `crgNombre` varchar(50) DEFAULT NULL,
  `crgParentesco` varchar(1) DEFAULT NULL,
  `crgFechaNac` date DEFAULT NULL,
  `crgFecReg` date DEFAULT NULL,
  `crgFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `crgEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`crgId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhcargo
CREATE TABLE IF NOT EXISTS `rrhcargo` (
  `carId` int(11) DEFAULT NULL,
  `carDescripcion` varchar(50) DEFAULT NULL,
  `carFecReg` datetime DEFAULT NULL,
  `carFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `carEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhclase
CREATE TABLE IF NOT EXISTS `rrhclase` (
  `claId` int(11) DEFAULT NULL,
  `claDescripcion` varchar(50) DEFAULT NULL,
  `claFecReg` datetime DEFAULT NULL,
  `claFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `claEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhdiasfestivos
CREATE TABLE IF NOT EXISTS `rrhdiasfestivos` (
  `diafesId` int(11) DEFAULT NULL,
  `diafesFecha` int(11) DEFAULT NULL,
  `diafesAño` int(11) DEFAULT NULL,
  `diafesFecReg` date DEFAULT NULL,
  `diafesFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `diafesEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhempleado
CREATE TABLE IF NOT EXISTS `rrhempleado` (
  `empId` int(11) NOT NULL AUTO_INCREMENT,
  `empCedula` varchar(10) DEFAULT NULL,
  `empNombre` varchar(30) DEFAULT NULL,
  `empApellido` varchar(30) DEFAULT NULL,
  `empDireccion` varchar(50) DEFAULT NULL,
  `empTelefono` varchar(50) DEFAULT NULL,
  `empEmail` varchar(50) DEFAULT NULL,
  `empFecNac` date DEFAULT NULL,
  `empSexo` varchar(1) DEFAULT NULL,
  `empLibMil` varchar(50) DEFAULT NULL,
  `empLicencia` varchar(50) DEFAULT NULL,
  `CiuId` int(11) DEFAULT NULL,
  `empNivEst` varchar(50) DEFAULT NULL,
  `prfId` int(11) DEFAULT NULL,
  `ProId` int(11) DEFAULT NULL,
  `empFecIng` date DEFAULT NULL,
  `empSueldo` decimal(10,0) DEFAULT NULL,
  `AreId` int(11) DEFAULT NULL,
  `CarId` int(11) DEFAULT NULL,
  `ClaId` int(11) DEFAULT NULL,
  `empFecReg` date DEFAULT NULL,
  `empFecMod` date DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `empEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.rrhprofesion
CREATE TABLE IF NOT EXISTS `rrhprofesion` (
  `prfId` int(11) DEFAULT NULL,
  `prfDescripcion` varchar(50) DEFAULT NULL,
  `prfFecReg` datetime DEFAULT NULL,
  `prfFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `prfEstado` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.segmodulo
CREATE TABLE IF NOT EXISTS `segmodulo` (
  `mdlId` int(11) NOT NULL AUTO_INCREMENT,
  `mdlDescripcion` varchar(150) DEFAULT NULL,
  `mdlFecReg` datetime DEFAULT NULL,
  `mdlFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `mdlEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`mdlId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.segopcion
CREATE TABLE IF NOT EXISTS `segopcion` (
  `opcId` int(11) NOT NULL AUTO_INCREMENT,
  `mdlId` int(11) NOT NULL DEFAULT '0',
  `opcDescripcion` int(11) DEFAULT NULL,
  `opcFecReg` datetime DEFAULT NULL,
  `opcFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `opcEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`opcId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.segrol
CREATE TABLE IF NOT EXISTS `segrol` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolDescripcion` varchar(50) NOT NULL,
  `rolFecReg` datetime DEFAULT NULL,
  `rolFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `rolEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`rolId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.segrolmodulo
CREATE TABLE IF NOT EXISTS `segrolmodulo` (
  `rmodId` int(11) NOT NULL AUTO_INCREMENT,
  `rolId` int(11) NOT NULL DEFAULT '0',
  `mdlId` int(11) NOT NULL DEFAULT '0',
  `opcId` int(11) NOT NULL DEFAULT '0',
  `rmodFecReg` datetime DEFAULT NULL,
  `rmodlFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `romdlEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`rmodId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.segusuario
CREATE TABLE IF NOT EXISTS `segusuario` (
  `usuId` int(11) NOT NULL AUTO_INCREMENT,
  `usuLogin` varchar(50) DEFAULT '',
  `usuClave` varchar(50) DEFAULT '',
  `usuNombre` varchar(100) DEFAULT '',
  `rolId` int(11) DEFAULT '0',
  `usuFecReg` datetime DEFAULT NULL,
  `usuFecMod` datetime DEFAULT NULL,
  `usuEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`usuId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.vencabventa
CREATE TABLE IF NOT EXISTS `vencabventa` (
  `vcvId` int(11) NOT NULL AUTO_INCREMENT,
  `cliId` int(11) NOT NULL DEFAULT '0',
  `vcvFecVen` datetime NOT NULL,
  `plcTipPag` varchar(50) NOT NULL DEFAULT '0',
  `plcTipVen` varchar(20) NOT NULL,
  `vcvSubtotal` decimal(10,2) NOT NULL,
  `vcvDescuento` decimal(10,2) NOT NULL,
  `vcvIva` decimal(10,2) NOT NULL,
  `vcvTotal` int(11) NOT NULL,
  `vcvFecReg` datetime NOT NULL,
  `vcvFecMod` datetime NOT NULL,
  `usuIdCre` int(11) NOT NULL,
  `usuIdMod` int(11) NOT NULL,
  `vcvEstado` int(11) NOT NULL,
  PRIMARY KEY (`vcvId`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.vencategoria
CREATE TABLE IF NOT EXISTS `vencategoria` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catDescripcion` varchar(50) DEFAULT NULL,
  `catFecReg` datetime DEFAULT NULL,
  `catFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `catEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.vendetventa
CREATE TABLE IF NOT EXISTS `vendetventa` (
  `dcvId` int(11) NOT NULL AUTO_INCREMENT,
  `vcvId` int(11) NOT NULL DEFAULT '0',
  `artId` int(11) NOT NULL DEFAULT '0',
  `dcvPreVen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dcvCantidad` int(11) NOT NULL DEFAULT '0',
  `dcvSubtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`dcvId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla integrador.vengrupo
CREATE TABLE IF NOT EXISTS `vengrupo` (
  `gruId` int(11) NOT NULL AUTO_INCREMENT,
  `gruDescripcion` varchar(50) DEFAULT NULL,
  `catId` int(11) DEFAULT NULL,
  `gruFecReg` datetime DEFAULT NULL,
  `gruFecMod` datetime DEFAULT NULL,
  `usuIdCre` int(11) DEFAULT NULL,
  `usuIdMod` int(11) DEFAULT NULL,
  `gruEstado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`gruId`),
  KEY `FK_vengrupo_vencategoria` (`catId`),
  CONSTRAINT `FK_vengrupo_vencategoria` FOREIGN KEY (`catId`) REFERENCES `vencategoria` (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

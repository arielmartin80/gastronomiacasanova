

--
-- Base de datos: `databasetpfinal`
--

-- --------------------------------------------------------

USE databaseGC;
DROP TABLE IF EXISTS cancelaciones;

--
-- Estructura de tabla para la tabla `cancelaciones`
--

CREATE TABLE `cancelaciones` (
  `id` int primary key AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `estado_pedido` varchar(50) NOT NULL,
  `motivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




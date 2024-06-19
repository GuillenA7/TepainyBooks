-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 07:48:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tepainybooks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` smallint(6) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `nombre`, `email`, `token_password`, `password_request`, `activo`, `fecha_alta`) VALUES
(1, 'admin', '$2y$10$pO7fsqtreuRN3Ysd1iV4g.LanYyRoY/9NtB85ymklD2TYYBdIF/oq', 'Administrador', 'admin@dominio.com', NULL, 0, 1, '2024-03-12 23:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `sentencia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `accion`, `fecha_hora`, `usuario`, `sentencia`) VALUES
(1, 'update', '2024-06-18 21:35:27', 'root@localhost', 'UPDATE productos SET nombre = \"Los Cuatro Acuerdos: Un libro de sabiduría tolteca\", ... WHERE id = 4'),
(2, 'update', '2024-06-18 21:43:00', 'root@localhost', 'UPDATE productos SET nombre = \"Bluey. ¿Dónde está Bluey?\", ... WHERE id = 6'),
(3, 'update', '2024-06-18 21:54:18', 'root@localhost', 'UPDATE productos SET nombre = \"Deja De Ser Tú\", ... WHERE id = 5'),
(4, 'update', '2024-06-18 22:00:07', 'root@localhost', 'UPDATE productos SET nombre = \"Deja De Ser Tú: La mente crea la realidad\", ... WHERE id = 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(1, 'Libro de autoayuda', 1),
(2, 'Literatura infantil', 1),
(3, 'Espiritualidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `email`, `telefono`, `dni`, `estatus`, `fecha_alta`, `fecha_modifica`, `fecha_baja`) VALUES
(1, 'Adrian', 'Guillen', 'adrianguillen2004@gmail.com', '123', '123', 1, '2024-06-18 15:20:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `medio_pago` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`, `medio_pago`) VALUES
(1, '8S53475734486115A', '2024-06-18 23:22:09', 'COMPLETED', 'adrianguillen2004@gmail.com', '1', 539.10, 'paypal'),
(2, '10791941EM933804P', '2024-06-19 04:12:08', 'COMPLETED', 'adrianguillen2004@gmail.com', '1', 11400.00, 'paypal'),
(3, '2AJ26466A1682911Y', '2024-06-19 04:51:20', 'COMPLETED', 'adrianguillen2004@gmail.com', '1', 643.95, 'paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', 'TepainyBooks'),
(2, 'tienda_telefono', '5511223344'),
(3, 'tienda_moneda', '$'),
(4, 'correo_smtp', 'smtp.gmail.com'),
(5, 'correo_email', 'adrianguillen2004@gmail.com'),
(6, 'correo_password', 'ipX7uSCglT96vjrBrcNtkgpOlmSnmi/BOBw5D84sfCqYgFkwhW+RYsbJl2zM6BVv'),
(7, 'correo_puerto', '587'),
(8, 'paypal_cliente', 'AVY1j-RdBnlFoF2LnPT4gvkGu1-FyOtDVp-SgyzARzrUe8atAoOztdVPSOR-s0DXBTl8sUwjhd1ac3fA'),
(9, 'paypal_moneda', 'MXN'),
(10, 'mp_token', 'TEST-3032682665147199-**********************'),
(11, 'mp_clave', 'TEST-f8d3d553-*****************');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 1, 'Zapatos color cafe', 539.10, 1),
(2, 2, 2, 'Laptop 15.6\" con Windows 11', 11400.00, 1),
(3, 3, 4, 'Los Cuatro Acuerdos: Un libro de sabiduría tolteca', 225.25, 1),
(4, 3, 6, 'Bluey. ¿Dónde está Bluey?', 119.00, 1),
(5, 3, 5, 'Deja De Ser Tú: La mente crea la realidad', 299.70, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(4) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `slug`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `id_categoria`, `activo`) VALUES
(1, 'h-bitos-at-micos', 'Hábitos Atómicos', '<p>HÁBITOS ATÓMICOS parte de una simple pero poderosa pregunta: ¿Cómo podemos vivir mejor? Sabemos que unos buenos hábitos nos permiten mejorar significativamente nuestra vida, pero con frecuencia nos desviamos del camino: dejamos de hacer ejercicio, comemos mal, dormimos poco, despilfarramos. ¿Por qué es tan fácil caer en los malos hábitos y tan complicado seguir los buenos? James Clear nos brinda fantásticas ideas basadas en investigaciones científicas, que le permiten revelarnos cómo podemos transformar pequeños hábitos cotidianos para cambiar nuestra vida y mejorarla. Esta guía pone al descubierto las fuerzas ocultas que moldean nuestro comportamiento —desde nuestra mentalidad, pasando por el ambiente y hasta la genética— y nos demuestra cómo aplicar cada cambio a nuestra vida y a nuestro trabajo. Después de leer este libro, tendrás un método sencillo para desarrollar un sistema eficaz que te conducirá al éxito. Aprende cómo… Darte tiempo para desarrollar nuevos hábitos Superar la falta de motivación y de fuerza de voluntad Diseñar un ambiente para que el éxito sea fácil de alcanzar Regresar al buen camino cuando te hayas desviado un poco</p>', 398.00, 0, 999, 1, 0),
(2, 'el-poder-del-ahora', 'El poder del ahora', '<p>El clásico que consagró a Eckhart Tolle como uno de los gurús más importantes del mundo. El poder del ahora es un libro único. Tiene la capacidad de crear una experiencia en los lectores y de cambiar su vida. Hoy ya es considerado una obra maestra. Su autor, Eckhart Tolle, se convirtió en un maestro universal, un gran espíritu con un gran mensaje: se puede alcanzar un estado de iluminación aquí y ahora. Es posible vivir libre del sufrimiento, de la ansiedad y de la neurosis. Para lograrlo sólo tenemos que comprender nuestro papel de creadores de nuestro dolor. Es nuestra propia mente la que causa nuestros problemas con su corriente constante de pensamientos, aferrándose al pasado, preocupándose por el futuro. Cometemos el error de identificarnos con ella, de pensar que eso es lo que somos, cuando de hecho somos seres mucho más grandes. Escrito en un formato de preguntas y respuestas que lo hace muy accesible, El poder del ahora es una invitación a la reflexión, que le abrirá las puertas a la plenitud espiritual y le permitirá verla vida con nuevos ojos y empezar a disfrutar del verdadero poder del ahora.</p>', 429.00, 59, 999, 1, 0),
(3, 'el-principito', 'El Principito', '<p>Pocas historias son tan universalmente leídas y apreciadas tanto por niños como adultos por igual como El Principito. Esta obra, que ha capturado los corazones de los lectores de todas las edades, es un cuento poético que viene acompañado de ilustraciones hechas con acuarelas por el mismo Saint-Exupéry. En él, un piloto se encuentra perdido en el desierto del Sahara después de que su avión sufriera una avería, pero para su sorpresa, es ahí donde conoce a un pequeño príncipe proveniente de otro planeta, y que lo enfrentará a muchos mundos que son su propio mundo.<br>A pesar de que es considerado un libro infantil por la forma en la que se encuentra escrito, también posee observaciones profundas sobre la vida y la naturaleza humanas.</p>', 62.00, 0, 1000, 2, 0),
(4, 'los-cuatro-acuerdos-un-libro-de-sabidur-a-tolteca', 'Los Cuatro Acuerdos: Un libro de sabiduría tolteca', '<p>El conocimiento tolteca surge de la misma unidad esencial de la verdad de la que parten todas las tradiciones esotéricas sagradas del mundo. Aunque no es una religión, respeta a todos los maestros espirituales que han enseñado en la tierra, y si bien abraza el espíritu, resulta más preciso describirlo como una manera de vivir que se distingue por su fácil acceso a la felicidad y el amor. El doctor Miguel Ruiz nos propone en este libro un sencillo procedimiento para eliminar todas aquellas creencias heredadas que nos limitan y substituirlas por otras que responden a nuestra realidad interior y nos conducen a la libertad. Hace miles de años los toltecas eran conocidos en todo el sur de México como «mujeres y hombres de conocimiento». Los antropólogos han definido a los toltecas como una nación o una raza, pero de hecho, eran científicos y artistas que formaron una sociedad para estudiar y conservar el conocimiento espiritual y las prácticas de sus antepasados. La conquista europea, unida a un agresivo abuso del poder personal por parte de algunos aprendices, hizo que los naguales se vieran forzados a esconder su sabiduría ancestral y a mantener su existencia en la oscuridad. Por fortuna, el conocimiento esotérico tolteca fue conservado y transmitido de una generación a otra por distintos linajes de naguales. Ahora, el doctor Miguel Ruiz, un nagual del linaje de los Guerreros del Águila, comparte con nosotros las profundas enseñanzas de los toltecas.</p>', 265.00, 15, 1000, 3, 1),
(5, 'deja-de-ser-t-la-mente-crea-la-realidad', 'Deja De Ser Tú: La mente crea la realidad', '<p><strong>Joe Dispenza</strong> saltó a la fama en nuestro país tras participar en la película ¿Y tú qué sabes?, un documental sobre la sobrecogedora capacidad de la mente para transformar la realidad que corrió de mano en mano sin ninguna publicidad, gracias al boca oreja.</p><p>Ahora, el popularísimo científico y autor de Desarrolla tu cerebro profundiza en todos aquellos temas que tanto nos cautivaron -física cuántica, neurociencia, biología y genética- para enseñarnos a reprogramar el cerebro y ampliar nuestro marco de realidad.</p><p>El resultado es un método práctico de trasformación para crear prosperidad y riqueza, pero también un viaje prodigioso a un nuevo estado de conciencia.</p>', 370.00, 19, 999, 1, 1),
(6, 'bluey-d-nde-est-bluey', 'Bluey. ¿Dónde está Bluey?', '<p><strong>¿Has visto a BLUEY y a BINGO?</strong></p><p>También hay muchas más cosas ocultas, ¡así que únete a la diversión en este libro de busca y encuentra!</p>', 119.00, 0, 1000, 2, 1);

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_producto` AFTER DELETE ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bitacora (accion, fecha_hora, usuario, sentencia)
    VALUES ('delete', NOW(), USER(), CONCAT('DELETE FROM productos WHERE id = ', OLD.id));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_producto` AFTER INSERT ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bitacora (accion, fecha_hora, usuario, sentencia)
    VALUES ('insert', NOW(), USER(), CONCAT('INSERT INTO productos (id, nombre, ...) VALUES (', NEW.id, ', "', NEW.nombre, '", ...)'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_producto` AFTER UPDATE ON `productos` FOR EACH ROW BEGIN
    INSERT INTO bitacora (accion, fecha_hora, usuario, sentencia)
    VALUES ('update', NOW(), USER(), CONCAT('UPDATE productos SET nombre = "', NEW.nombre, '", ... WHERE id = ', NEW.id));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `activacion`, `token`, `token_password`, `password_request`, `id_cliente`) VALUES
(1, 'Adri', '$2y$10$yTjxRK4B.SCf3OTCy8G6xeDopP01rhpvz6JoTK2gV8W/kMuivCQ7i', 1, '', NULL, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

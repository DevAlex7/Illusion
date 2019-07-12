-- phpMyAdmin SQL Dump test
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 02:09:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `illusion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_in_event`
--

CREATE TABLE `comments_in_event` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments_in_event`
--

INSERT INTO `comments_in_event` (`id`, `id_event`, `id_employee`, `message`, `date`) VALUES
(1, 22, 4, 'Hola', '2019-06-09'),
(2, 22, 4, 'as\r\n', '2019-06-09'),
(3, 22, 4, 'Hola como estan xd', '2019-06-09'),
(4, 22, 4, 'No jodan', '2019-06-09'),
(5, 22, 4, 'pendejos', '2019-06-09'),
(6, 20, 4, 'jajajaja no mamen', '2019-06-09'),
(7, 22, 4, 'En este evento falta la compra de soda', '2019-06-09'),
(8, 22, 8, 'esta bien ya las compro', '2019-06-09'),
(9, 20, 8, 'jejejej', '2019-06-09'),
(10, 19, 8, 'Faltan churros', '2019-06-09'),
(11, 22, 4, 'JAJJAJAJAJA', '2019-06-10'),
(12, 22, 8, 'Alguien sabe donde estan las sodas', '2019-06-10'),
(13, 22, 8, 'hola?', '2019-06-10'),
(14, 22, 8, 'Donde estan las sodas?', '2019-06-10'),
(15, 22, 4, 'NO ', '2019-06-10'),
(16, 22, 4, 'NO jeje', '2019-06-11'),
(17, 22, 4, 'NO ', '2019-06-11'),
(18, 22, 4, 'asdddasd', '2019-06-11'),
(19, 22, 4, 'NO jeje', '2019-06-11'),
(20, 22, 4, 'Hola', '2019-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(4, 'Alejandro', 'Gonzalez', 'alexgve7@gmail.com', 'Ale12345', '$2y$10$ztUHP8ADQWauh401IejY3OjdX07W0aFeZTv80muGW6QmGkGNXcoLy', 0),
(7, 'Marvin', 'Gonzalez', 'alexgve7sss@gmail.com', 'Ale123458', '$2y$10$aV.JaxcfdoRDIJ1CZ8v/4OyZuMZUJcPQqA0mBA4g6q6OuPnfm0ymy', 0),
(8, 'Steven', 'Diaz', 'Steven@gmail.com', 'StevenDF', '$2y$10$zlRonj/bg.hzPXu5XB2URe2Pm7dYEqZZO/NgGUE2UC96F.PDB3lyG', 1),
(9, 'Gabriela ', 'Ramos', 'Akatgaby@gmail.com', 'Akatgaby', '$2y$10$ZbZqeTyn0d/JRUJD/L17TOLcVMud/88mIcrtGIADx0Az79.Inzh66', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name_event` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `price` double(5,2) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `type_event` int(11) NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `name_event`, `date`, `client_name`, `id_employee`, `price`, `pay_status`, `type_event`, `place`) VALUES
(19, 'Rick Y Morty', '2019-06-12', 'Cifco', 7, 0.00, 2, 7, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.504444836977!2d-89.23818658551002!3d13.687869902460365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63302e0175567d%3A0x74ed22bace281c11!2sCIFCO!5e0!3m2!1ses-419!2ssv!4v1560010192140!5m2!1ses-419!2ssv\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(20, 'Mac donalds', '2019-06-12', 'Mac Donalds El Salvador', 7, 0.00, 2, 7, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.504444836977!2d-89.23818658551002!3d13.687869902460365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63302e0175567d%3A0x74ed22bace281c11!2sCIFCO!5e0!3m2!1ses-419!2ssv!4v1560010192140!5m2!1ses-419!2ssv\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(22, 'Prensa Grafica', '2019-06-13', 'Meme', 4, 0.00, 2, 7, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62017.53585607904!2d-89.22426765956978!3d13.712635737542742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x34d9616c709a6fc1!2sHotel+Real+InterContinental+San+Salvador!5e0!3m2!1ses-419!2ssv!4v1560371055307!5m2!1ses-419!2ssv\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(23, 'ITR Intramuros', '2019-06-13', 'Ricaldone', 7, 0.00, 2, 7, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15502.620093661784!2d-89.21818175267451!3d13.739323828975923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f633a804026a34d%3A0x50e59d1e39c37e33!2sPizza+Hut+Metr%C3%B3polis!5e0!3m2!1ses-419!2ssv!4v1560028302240!5m2!1ses-419!2ssv\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_types`
--

INSERT INTO `event_types` (`id`, `type`) VALUES
(4, 'Primera Confirma'),
(5, 'Nacimientos'),
(6, 'Navidad'),
(7, 'Cumpleaños'),
(8, 'Graduación'),
(9, 'Aniversario'),
(10, 'Conferencias'),
(11, 'Bodas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_invitations_event`
--

CREATE TABLE `list_invitations_event` (
  `id` int(11) NOT NULL,
  `namePerson` varchar(200) NOT NULL,
  `lastnamePerson` varchar(200) NOT NULL,
  `id_event` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list_invitations_event`
--

INSERT INTO `list_invitations_event` (`id`, `namePerson`, `lastnamePerson`, `id_event`, `date`) VALUES
(1, 'Emmanuel', 'Escobar', 22, '2019-06-12'),
(2, 'Sebastian ', 'Jimenez', 22, '2019-06-12'),
(3, 'Gaby', 'Ramos', 22, '2019-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_products_event`
--

CREATE TABLE `list_products_event` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list_products_event`
--

INSERT INTO `list_products_event` (`id`, `id_product`, `count`, `id_event`, `date`) VALUES
(1, 4, 0, 22, '2019-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_event_status`
--

CREATE TABLE `payment_event_status` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payment_event_status`
--

INSERT INTO `payment_event_status` (`id`, `status`) VALUES
(1, 'Pagado'),
(2, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nameProduct` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_employee` int(11) NOT NULL,
  `price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nameProduct`, `count`, `date`, `id_employee`, `price`) VALUES
(3, 'Piñata', 39, '2019-05-31', 4, 4.50),
(4, 'Arreglos Florales ', 18, '2019-06-01', 4, 3.50),
(5, 'Platos desechables', 100, '2019-06-01', 4, 20.50),
(6, 'Pilseners', 50, '2019-06-03', 8, 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `replies_comments`
--

CREATE TABLE `replies_comments` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `replies_comments`
--

INSERT INTO `replies_comments` (`id`, `id_message`, `id_employee`, `message`, `date`) VALUES
(1, 1, 4, 'hey jaja xd', '2019-06-05'),
(2, 8, 4, 'Ok', '2019-06-26'),
(3, 10, 4, 'ya los ire a comprar', '2019-06-09'),
(4, 8, 8, 'vos solo', '2019-06-10'),
(5, 4, 8, 'puff', '2019-06-10'),
(6, 7, 8, 'puff', '2019-06-10'),
(7, 5, 8, 'vos solo', '2019-06-10'),
(8, 11, 8, 'ssadads', '2019-06-10'),
(9, 11, 8, 'JAJAJAJ que ponte a trabajar', '2019-06-10'),
(10, 11, 8, '12', '2019-06-10'),
(11, 11, 8, 'no se man', '2019-06-10'),
(12, 11, 8, 'jajajaja xd', '2019-06-10'),
(13, 11, 8, 'hey chupala', '2019-06-10'),
(14, 12, 8, 'No', '2019-06-10'),
(15, 14, 8, 'Estan en la refri', '2019-06-10'),
(16, 14, 4, 'Hola, fijate que no estan ahi', '2019-06-10'),
(17, 7, 4, 'Comprala steven', '2019-06-10'),
(18, 7, 4, 'Porfa hacete la tarea :p', '2019-06-10'),
(19, 7, 4, 'osea', '2019-06-10'),
(20, 14, 4, 'No man', '2019-06-10'),
(21, 7, 4, 'Hey porfa man jaja xd\r\n', '2019-06-10'),
(22, 2, 4, 'hole', '2019-06-10'),
(23, 1, 4, 'Steven me la pela', '2019-06-10'),
(24, 3, 4, 'Todo bien bien', '2019-06-10'),
(25, 3, 4, 'nada mal eh', '2019-06-10'),
(26, 16, 4, 'No mames man', '2019-06-11'),
(27, 8, 4, 'Que pedo maje', '2019-06-12'),
(28, 7, 4, 'pelamela', '2019-06-12'),
(29, 12, 4, 'en tu casa perro', '2019-06-12'),
(30, 1, 4, 'Hola hijo mio ', '2019-06-12'),
(31, 8, 8, 'que pedo xd\r\n', '2019-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name_client` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `date_event` date NOT NULL,
  `phone_number` varchar(9) NOT NULL,
  `type_event` int(11) NOT NULL,
  `description_event` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requests`
--

INSERT INTO `requests` (`id`, `name_client`, `last_name`, `e_mail`, `date_event`, `phone_number`, `type_event`, `description_event`, `status`) VALUES
(3, 'Alejandro', 'Gonzalez', 'alexgve7@gmail.com', '2019-06-13', '6171-5087', 7, 'Quiero un cumpleaños para mi hija', 2),
(6, 'Alejandro', 'Gonzalez', 'alexgve7sv@gmail.com', '2019-06-14', '6172-5087', 8, 'Graduación de  mi hija', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'Administrador'),
(1, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `share_events`
--

CREATE TABLE `share_events` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `share_events`
--

INSERT INTO `share_events` (`id`, `id_event`, `id_employee`) VALUES
(2, 20, 7),
(5, 22, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_requests`
--

CREATE TABLE `status_requests` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status_requests`
--

INSERT INTO `status_requests` (`id`, `status`) VALUES
(1, 'Aceptado'),
(2, 'Rechazado'),
(3, 'Pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_event` (`id_event`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `pay_status` (`pay_status`),
  ADD KEY `events_ibfk_3` (`type_event`);

--
-- Indices de la tabla `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `list_invitations_event`
--
ALTER TABLE `list_invitations_event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namePerson` (`namePerson`),
  ADD UNIQUE KEY `lastnamePerson` (`lastnamePerson`),
  ADD KEY `id_event` (`id_event`);

--
-- Indices de la tabla `list_products_event`
--
ALTER TABLE `list_products_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `payment_event_status`
--
ALTER TABLE `payment_event_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nameProduct` (`nameProduct`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indices de la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_message` (`id_message`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_mail` (`e_mail`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `status` (`status`),
  ADD KEY `type_event` (`type_event`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `share_events`
--
ALTER TABLE `share_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_event` (`id_event`);

--
-- Indices de la tabla `status_requests`
--
ALTER TABLE `status_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `list_invitations_event`
--
ALTER TABLE `list_invitations_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `list_products_event`
--
ALTER TABLE `list_products_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payment_event_status`
--
ALTER TABLE `payment_event_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `share_events`
--
ALTER TABLE `share_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `status_requests`
--
ALTER TABLE `status_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  ADD CONSTRAINT `comments_in_event_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_in_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`pay_status`) REFERENCES `payment_event_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`type_event`) REFERENCES `event_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `list_invitations_event`
--
ALTER TABLE `list_invitations_event`
  ADD CONSTRAINT `list_invitations_event_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `list_products_event`
--
ALTER TABLE `list_products_event`
  ADD CONSTRAINT `list_products_event_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_products_event_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  ADD CONSTRAINT `replies_comments_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_comments_ibfk_2` FOREIGN KEY (`id_message`) REFERENCES `comments_in_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`type_event`) REFERENCES `event_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `share_events`
--
ALTER TABLE `share_events`
  ADD CONSTRAINT `share_events_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_events_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

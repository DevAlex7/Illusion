-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2019 a las 21:59:01
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
-- Estructura de tabla para la tabla `binnacle`
--

CREATE TABLE `binnacle` (
  `id` int(11) NOT NULL,
  `action_performed` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `binnacle`
--

INSERT INTO `binnacle` (`id`, `action_performed`, `id_user`, `date`) VALUES
(6, 'ha añadido un administrador', 4, '2019-06-17'),
(7, 'Se ha insertado un nuevo producto: Soda Fanta', 4, '2019-06-18'),
(8, 'ha agregado un nuevo tipo de evento: Conciertos', 4, '2019-06-17'),
(9, 'Se ha insertado un nuevo producto: Dulces americanos', 7, '2019-06-27'),
(10, 'Se ha insertado un nuevo producto: Bolsa wonka', 7, '2019-07-20'),
(11, 'Se ha insertado un nuevo producto: Bolsa wonka', 7, '2019-07-20');

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
(9, 'Gabriela ', 'Ramos', 'Akatgaby@gmail.com', 'Akatgaby', '$2y$10$ZbZqeTyn0d/JRUJD/L17TOLcVMud/88mIcrtGIADx0Az79.Inzh66', 0),
(10, 'Alejandro', 'Gonzalez', 'alexgve7sv@gmail.com', 'Alexgve7', '$2y$10$F0oQIOxd4yj9UVB5V148CuDXM2qhFseWJ0lZESCGJalOP64/06myS', 2),
(13, 'Gabriela ', 'Ramos', 'gabyramos@gmail.com', 'GabyRamos7', '$2y$10$I/hsY0q.Q480ZaM56J2Vnu4zhjT3uaDgqtukLGNKlfWdY.o0EwBd.', 2),
(22, 'Herbert', 'Maldonado', 'herbert@gmail.com', 'Cornejo04', '$2y$10$w1i6PcCfkEARS8K04mQlLOJTIsJjgzKU6St8elkB54JCUOgbmtovq', 2),
(23, 'Benjamin', 'Flores', 'stevenbdf@gmail.com', 'stevenbdf2019', '$2y$10$EcIpeGnCghNLjnfJKkWHO.Z/TqXA9EMGjPeozviCl5yCLsOJz5efe', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name_event` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `price` double(5,2) DEFAULT NULL,
  `pay_status` int(11) DEFAULT NULL,
  `type_event` int(11) DEFAULT NULL,
  `place` text,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `name_event`, `date`, `client_name`, `id_employee`, `price`, `pay_status`, `type_event`, `place`, `date_created`) VALUES
(8, 'Toy story thematic', '2019-07-14', 'Alejandro Gonzalez', 8, NULL, 2, 7, NULL, '2019-07-03'),
(9, 'Marvel comics chicago', '2019-07-15', 'Alejandro Gonzalez', 8, NULL, 1, 10, NULL, '2019-07-01'),
(11, 'Tomorrowland Belgium\r\n', '2019-07-31', 'Alejandro Gonzalez', 8, NULL, 2, 19, NULL, '2019-07-16'),
(12, 'Tomorrowland', '2019-07-31', 'Alejandro Gonzalez', 8, NULL, 2, 19, NULL, '2019-07-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_assignments`
--

CREATE TABLE `event_assignments` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_assignments`
--

INSERT INTO `event_assignments` (`id`, `id_event`, `id_request`, `id_client`) VALUES
(2, 11, 29, 10),
(3, 12, 29, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_requests`
--

CREATE TABLE `event_requests` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Nacimientos'),
(6, 'Navidad'),
(7, 'Cumpleaños'),
(8, 'Graduación'),
(9, 'Aniversario'),
(10, 'Conferencias'),
(11, 'Bodas'),
(12, 'Baby shower'),
(13, 'Primera Confirma'),
(14, 'lghytf'),
(15, 'Hol'),
(16, 'Alejandro'),
(17, 'Alejandro'),
(18, 'Celebridad'),
(19, 'Conciertos'),
(20, 'FIesta'),
(21, 'Tomorrowland');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_states`
--

CREATE TABLE `like_states` (
  `id` int(11) NOT NULL,
  `action` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `like_states`
--

INSERT INTO `like_states` (`id`, `action`) VALUES
(1, 'like'),
(2, 'dislike');

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
(1, 17, 2, 9, '2019-07-25'),
(2, 23, 2, 9, '2019-07-25'),
(5, 17, 2, 8, '2019-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_product_request`
--

CREATE TABLE `list_product_request` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `image_product` varchar(200) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_employee` int(11) NOT NULL,
  `price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nameProduct`, `image_product`, `count`, `date`, `id_employee`, `price`) VALUES
(17, 'Bolsa wonka', '5d3345e7a8c4c.jpg', 16, '2019-07-20', 7, 8.50),
(23, 'Cerveza corona', '5d33834ddc97b.jpg', 8, '2019-07-20', 7, 5.00);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `date_event` date NOT NULL,
  `name_event` varchar(200) NOT NULL,
  `type_event` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `description_event` text NOT NULL,
  `status` int(11) NOT NULL,
  `public_user_id` int(11) NOT NULL,
  `date_request` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requests`
--

INSERT INTO `requests` (`id`, `date_event`, `name_event`, `type_event`, `persons`, `description_event`, `status`, `public_user_id`, `date_request`) VALUES
(25, '2019-08-18', 'Toy story thematic', 7, 200, 'Un evento de toy story', 1, 10, '2019-07-27'),
(27, '2019-08-08', 'Dc comics comic con', 10, 700, 'Una comic con de DC comics', 3, 23, '2019-07-29'),
(28, '2019-07-30', 'Huevocartoon', 6, 100, 'Un evento de huevo cartoon', 3, 10, '2019-07-30'),
(29, '2019-07-31', 'Tomorrowland', 19, 1000, 'Evento de musica electronica', 1, 10, '2019-07-29'),
(30, '2019-08-03', 'Mi evento', 7, 100, 'Un evento', 3, 10, '2019-08-03'),
(31, '2019-08-03', 'Taquillera', 10, 500, 'Un evento de tacos', 3, 10, '2019-08-03'),
(32, '2019-08-08', 'Sony', 9, 100, 'Un evento para presentar la play 1', 3, 4, '2019-07-31'),
(33, '2019-08-04', 'Evento de nintendo', 18, 100, 'Evento de nintendo de switch', 3, 4, '2019-08-04');

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
(1, 'Empleado'),
(2, 'Usuario publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `share_events`
--

CREATE TABLE `share_events` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votes_products`
--

CREATE TABLE `votes_products` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `votes_products`
--

INSERT INTO `votes_products` (`id`, `id_user`, `id_product`, `id_vote`) VALUES
(35, 23, 17, 1),
(36, 10, 17, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
  ADD KEY `pay_status` (`pay_status`),
  ADD KEY `events_ibfk_3` (`type_event`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `events_ibfk_4` (`client_name`);

--
-- Indices de la tabla `event_assignments`
--
ALTER TABLE `event_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `event_assignments_ibfk_2` (`id_request`),
  ADD KEY `id_client` (`id_client`);

--
-- Indices de la tabla `event_requests`
--
ALTER TABLE `event_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_event` (`id_event`);

--
-- Indices de la tabla `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `like_states`
--
ALTER TABLE `like_states`
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
-- Indices de la tabla `list_product_request`
--
ALTER TABLE `list_product_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_request` (`id_request`);

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
  ADD KEY `status` (`status`),
  ADD KEY `type_event` (`type_event`),
  ADD KEY `public_user_id` (`public_user_id`);

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
-- Indices de la tabla `votes_products`
--
ALTER TABLE `votes_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vote` (`id_vote`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `event_assignments`
--
ALTER TABLE `event_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `event_requests`
--
ALTER TABLE `event_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `like_states`
--
ALTER TABLE `like_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `list_invitations_event`
--
ALTER TABLE `list_invitations_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_products_event`
--
ALTER TABLE `list_products_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `list_product_request`
--
ALTER TABLE `list_product_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_event_status`
--
ALTER TABLE `payment_event_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `share_events`
--
ALTER TABLE `share_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status_requests`
--
ALTER TABLE `status_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `votes_products`
--
ALTER TABLE `votes_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
-- Filtros para la tabla `event_assignments`
--
ALTER TABLE `event_assignments`
  ADD CONSTRAINT `event_assignments_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_assignments_ibfk_2` FOREIGN KEY (`id_request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_assignments_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `event_requests`
--
ALTER TABLE `event_requests`
  ADD CONSTRAINT `event_requests_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_requests_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `list_product_request`
--
ALTER TABLE `list_product_request`
  ADD CONSTRAINT `list_product_request_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_product_request_ibfk_2` FOREIGN KEY (`id_request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`type_event`) REFERENCES `event_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`public_user_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `share_events`
--
ALTER TABLE `share_events`
  ADD CONSTRAINT `share_events_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_events_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votes_products`
--
ALTER TABLE `votes_products`
  ADD CONSTRAINT `votes_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_products_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_products_ibfk_3` FOREIGN KEY (`id_vote`) REFERENCES `like_states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

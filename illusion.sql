-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2019 a las 03:18:47
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
(1, 'Se ha insertado un nuevo producto: Tomates', 4, '2019-08-08'),
(6, 'ha añadido un administrador', 4, '2019-06-17'),
(7, 'Se ha insertado un nuevo producto: Soda Fanta', 4, '2019-06-18'),
(8, 'ha agregado un nuevo tipo de evento: Conciertos', 4, '2019-06-17'),
(9, 'Se ha insertado un nuevo producto: Dulces americanos', 7, '2019-06-27'),
(10, 'Se ha insertado un nuevo producto: Bolsa wonka', 7, '2019-07-20'),
(11, 'Se ha insertado un nuevo producto: Bolsa wonka', 7, '2019-07-20'),
(12, 'Se ha insertado un nuevo producto: Cerveza corona', 7, '2019-08-08'),
(13, 'Se ha insertado un nuevo producto: Wonkas caja', 7, '2019-08-09'),
(14, 'Se ha insertado un nuevo producto: Bolsa wonka', 7, '2019-08-09'),
(15, 'Se ha insertado un nuevo producto: Globos', 7, '2019-08-09'),
(16, 'ha agregado un nuevo tipo de evento: Reunion Corporativa', 7, '2019-08-12'),
(17, 'Se ha insertado un nuevo producto: Wonka', 7, '2019-08-14');

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
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `google_secret_key` varchar(100) NOT NULL,
  `setting_status` int(11) NOT NULL,
  `tries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `lastname`, `email`, `username`, `password`, `role`, `status`, `google_secret_key`, `setting_status`, `tries`) VALUES
(24, 'Alejandro', 'Gonzalez', 'alexgve7@gmail.com', 'Alexgve7', '$2y$10$dfOJAXdp1BLGsGtDw09Nrujy9ubPLRlft2A8y38khXlmzeFZPxd0O', 0, 1, 'LFIES7OR23O4SSXI', 1, 0),
(25, 'Manuel', 'Gonzalez', 'alexgve7sv@gmail.com', 'ManuelGon77', '$2y$10$SI8GSvLvgtmuvFP5Rj4mme2.TPtWiGBy613KsBdE07jlrYYZhR0B6', 0, 1, 'RGXX27U353WUKJRJ', 1, 3),
(27, 'Steven', 'Diaz', 'stevenbdf@gmail.com', 'stevenbdf', '$2y$10$GKuLIo9HG.7aMaNhEc4lEeyfN33ipgSo/7TRBhhKe85slbZvP1Sx2', 0, 1, 'ZKBNOY2IAAC7LN3O', 1, -1);

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
  `persons` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 'Convenciones'),
(18, 'Celebridad'),
(19, 'Conciertos'),
(20, 'FIesta'),
(21, 'Tomorrowland'),
(22, 'Marcha'),
(23, 'Convenciones'),
(24, 'Celebridad'),
(25, 'Club Party'),
(26, 'Pool Party'),
(27, 'Reunion Corporativa');

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
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification` varchar(70) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `id_user`) VALUES
(2, 'Alexgve7 tiene la cuenta suspendida debido a varios intentos de bloque', 24);

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
-- Estructura de tabla para la tabla `setting_status`
--

CREATE TABLE `setting_status` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `setting_status`
--

INSERT INTO `setting_status` (`id`, `status`) VALUES
(1, 'habilitado'),
(2, 'deshabilitado');

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
-- Estructura de tabla para la tabla `user_states`
--

CREATE TABLE `user_states` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_states`
--

INSERT INTO `user_states` (`id`, `status`) VALUES
(1, 'activo'),
(2, 'Inactivo'),
(3, 'desactivado');

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
  ADD KEY `role` (`role`),
  ADD KEY `status` (`status`),
  ADD KEY `setting_status` (`setting_status`);

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
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- Indices de la tabla `setting_status`
--
ALTER TABLE `setting_status`
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
-- Indices de la tabla `user_states`
--
ALTER TABLE `user_states`
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
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event_assignments`
--
ALTER TABLE `event_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event_requests`
--
ALTER TABLE `event_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_product_request`
--
ALTER TABLE `list_product_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `payment_event_status`
--
ALTER TABLE `payment_event_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `setting_status`
--
ALTER TABLE `setting_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`status`) REFERENCES `user_states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`setting_status`) REFERENCES `setting_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

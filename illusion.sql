-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2019 a las 19:07:20
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
(16, 'ha agregado un nuevo tipo de evento: Reunion Corporativa', 7, '2019-08-12');

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
(1, 88, 7, 'Hola chicos\r\n', '2019-08-14');

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
(7, 'Marvin ', 'González Ventura', 'alexgve7sss@gmail.com', 'Ale123458', '$2y$10$aV.JaxcfdoRDIJ1CZ8v/4OyZuMZUJcPQqA0mBA4g6q6OuPnfm0ymy', 0),
(8, 'Steven', 'Diaz', 'Steven@gmail.com', 'StevenDF', '$2y$10$zlRonj/bg.hzPXu5XB2URe2Pm7dYEqZZO/NgGUE2UC96F.PDB3lyG', 1),
(9, 'Gabriela ', 'Ramos', 'Akatgaby@gmail.com', 'Akatgaby', '$2y$10$ZbZqeTyn0d/JRUJD/L17TOLcVMud/88mIcrtGIADx0Az79.Inzh66', 0),
(10, 'Alejandro', 'Gonzalez', 'alexgve7sv@gmail.com', 'Alexgve7', '$2y$10$F0oQIOxd4yj9UVB5V148CuDXM2qhFseWJ0lZESCGJalOP64/06myS', 2),
(13, 'Gabriela ', 'Ramos', 'gabyramos@gmail.com', 'GabyRamos7', '$2y$10$I/hsY0q.Q480ZaM56J2Vnu4zhjT3uaDgqtukLGNKlfWdY.o0EwBd.', 2),
(22, 'Herbert', 'Maldonado', 'herbert@gmail.com', 'Cornejo04', '$2y$10$w1i6PcCfkEARS8K04mQlLOJTIsJjgzKU6St8elkB54JCUOgbmtovq', 2),
(23, 'Benjamin', 'Flores', 'stevenbdf@gmail.com', 'stevenbdf2019', '$2y$10$EcIpeGnCghNLjnfJKkWHO.Z/TqXA9EMGjPeozviCl5yCLsOJz5efe', 2),
(24, 'Gaby', 'Ramos', 'aki@gmail.com', 'Diastro', '$2y$10$sJtU8fBCJrR.i1x9jKJbLucKkWg4jRF/jAtQQvsKf7xrS6sE.yXDC', 0);

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

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `name_event`, `date`, `client_name`, `id_employee`, `price`, `pay_status`, `type_event`, `place`, `persons`, `date_created`) VALUES
(8, 'Toy story thematic', '2019-07-14', 'Alejandro Gonzalez', 8, NULL, 2, 7, NULL, 100, '2019-07-03'),
(9, 'Marvel comics chicago', '2019-07-15', 'Alejandro Gonzalez', 8, NULL, 1, 10, NULL, 200, '2019-07-01'),
(11, 'Tomorrowland Belgium\r\n', '2019-07-31', 'Alejandro Gonzalez', 4, NULL, 2, 19, NULL, 400, '2019-07-16'),
(12, 'Tomorrowland', '2019-07-31', 'Alejandro Gonzalez', 8, NULL, 2, 19, NULL, 123, '2019-07-16'),
(73, 'Cumpleaños de Shrek', '2019-09-01', 'Ciel Romanov', 24, 0.00, 2, 7, '<header></header>', 50, '2019-08-01'),
(74, 'Kermit y plaza sésamo.', '2020-02-02', 'Alejandro Manuel', 24, 0.00, 2, 10, '<frame></frame>', 10, '2019-07-10'),
(75, 'My Little Pony', '2019-12-12', 'André Candray', 24, 0.00, 2, 5, '<frame></frame>', 20, '2019-07-28'),
(76, 'Cumpleaños de Fabi', '2019-10-15', 'Allison Cartagena', 24, 0.00, 2, 18, '<frame></frame>', 40, '2019-07-10'),
(77, 'Boda de Marcela', '2021-05-05', 'Marcela Girón', 24, 0.00, 2, 11, '<frame></frame>', 70, '2019-07-31'),
(78, 'Boda de Alfaro', '2025-12-23', 'Daniel Alfaro', 24, 0.00, 2, 11, '<frame></frame>', 60, '2019-07-23'),
(79, 'Boda de Katherina', '2020-01-02', 'América Ivanov', 9, 0.00, 2, 11, '<frame></frame>', 30, '2019-07-30'),
(80, 'Cumpleaños de Bad Bunny', '2019-11-11', 'Benito Antonio', 9, 0.00, 2, 7, '<frame></frame>', 90, '2019-07-23'),
(81, 'Fiesta de Diastro y Castiel', '2019-09-01', 'Gabriela Ramos', 9, 0.00, 2, 18, '<frame></frame>', 125, '2019-07-25'),
(82, 'Aquafest', '2019-12-31', 'Fátima Minco', 9, 0.00, 2, 22, '<frame></frame>', 65, '2019-07-25'),
(83, 'Fiesta de Hackers', '2019-09-01', 'Anonym Zweig', 9, 0.00, 2, 10, '<frame></frame>', 110, '2019-07-26'),
(84, 'Graduación de la hija de Meme', '2019-11-11', 'Alejandro Manuel', 9, 0.00, 2, 8, '<frame></frame>', 45, '2019-07-21'),
(85, 'Experimento 626', '2019-09-01', 'Silvia Prado', 9, 0.00, 2, 22, '<frame></frame>', 35, '2019-08-22'),
(86, 'Degustaciones La parca', '2020-12-31', 'María Encarnación', 9, 0.00, 2, 17, '<frame></frame>', 120, '2019-07-23'),
(87, 'Inauguración del nuevo spa', '2019-09-01', 'Diastro Addict', 9, 0.00, 2, 5, '<frame></frame>', 160, '2019-07-26'),
(88, 'Mi evento', '2019-08-03', 'Alejandro Gonzalez', 7, NULL, 2, 7, NULL, 15, '2019-07-31'),
(89, 'Dc comics comic con', '2019-08-08', 'Benjamin Flores', 7, NULL, 2, 10, NULL, 100, '2019-08-08'),
(90, 'Huevocartoon', '2019-07-30', 'Alejandro Gonzalez', 7, NULL, 2, 6, NULL, 100, '2019-08-10'),
(91, 'Taquillera', '2019-08-03', 'Alejandro Gonzalez', 7, NULL, 2, 10, NULL, 500, '2019-08-10'),
(92, 'Evento de nintendo', '2019-08-04', 'Alejandro Gonzalez', 7, NULL, 2, 18, NULL, 100, '2019-08-13');

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
(3, 12, 29, 10),
(4, 89, 27, 23),
(5, 90, 28, 10),
(6, 91, 31, 10),
(7, 92, 33, 4);

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

--
-- Volcado de datos para la tabla `list_invitations_event`
--

INSERT INTO `list_invitations_event` (`id`, `namePerson`, `lastnamePerson`, `id_event`, `date`) VALUES
(1, 'Fernando André', 'Candray Castillo', 11, '2019-08-08'),
(2, 'Alejandro  Manuel ', 'Gonzalez', 88, '2019-08-08'),
(7, 'Gaby', 'asda', 91, '2019-08-12');

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
(67, 'Bolsa de dulces', '5d5327a968704.jpg', 50, '2019-08-13', 24, 2.00),
(68, 'Centros de mesa', '5d5327e81eb4a.jpg', 20, '2019-08-13', 24, 5.00),
(69, 'Vasos rosas', '5d5328031c01c.jpg', 70, '2019-08-13', 24, 1.00),
(70, 'Bolsas de pastelitos', '5d53281f3ac02.jpg', 50, '2019-08-13', 24, 2.50),
(71, 'Bola disco', '5d53284b396b4.jpg', 25, '2019-08-13', 24, 10.00),
(72, 'Helados', '5d53286f355a3.jpg', 50, '2019-08-13', 24, 3.00),
(73, 'Serpentinas', '5d53289a3341f.jpg', 100, '2019-08-13', 24, 0.50),
(74, 'Manteles para ocasiones', '5d5328c3e537c.jpg', 90, '2019-08-13', 24, 4.00),
(75, 'Coca colas pack', '5d5328eec57e9.jpg', 180, '2019-08-13', 24, 8.00),
(76, 'Letras banderines', '5d5329244a66f.jpg', 500, '2019-08-13', 24, 2.00),
(77, 'L?mparas de papel', '5d53294e1c80f.jpg', 60, '2019-08-13', 24, 5.00),
(78, 'Flotadores para ni?os', '5d53297e05c79.jpg', 50, '2019-08-13', 24, 8.00),
(79, 'Pi?ata', '5d5329de55143.png', 200, '2019-08-13', 24, 12.00),
(80, 'Platos desechables', '5d532a657d142.jpg', 200, '2019-08-13', 24, 6.00),
(81, 'Regalos baby shower', '5d532ad10e6c3.jpg', 60, '2019-08-13', 24, 10.00),
(82, 'Ramos', '5d532afe7a00e.jpg', 90, '2019-08-13', 24, 20.00),
(83, 'Sillas alquiladas', '5d532b66f3eeb.jpg', 500, '2019-08-13', 24, 25.00),
(84, 'Servilletas', '5d532b9a586b3.jpeg', 500, '2019-08-13', 24, 15.00);

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
(1, 1, 7, 'que pedo maje', '2019-08-14'),
(2, 1, 7, 'Que contas?', '2019-08-14'),
(3, 1, 7, 'Que contas?', '2019-08-14');

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
(27, '2019-08-08', 'Dc comics comic con', 10, 700, 'Una comic con de DC comics', 1, 23, '2019-07-29'),
(28, '2019-07-30', 'Huevocartoon', 6, 100, 'Un evento de huevo cartoon', 1, 10, '2019-07-30'),
(29, '2019-07-31', 'Tomorrowland', 19, 1000, 'Evento de musica electronica', 1, 10, '2019-07-29'),
(30, '2019-08-03', 'Mi evento', 7, 100, 'Un evento', 1, 10, '2019-08-03'),
(31, '2019-08-03', 'Taquillera', 10, 500, 'Un evento de tacos', 2, 10, '2019-08-03'),
(32, '2019-08-08', 'Sony', 9, 100, 'Un evento para presentar la play 1', 1, 4, '2019-07-31'),
(33, '2019-08-04', 'Evento de nintendo', 18, 100, 'Evento de nintendo de switch', 1, 4, '2019-08-04');

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

--
-- Volcado de datos para la tabla `share_events`
--

INSERT INTO `share_events` (`id`, `id_event`, `id_employee`) VALUES
(1, 88, 7),
(2, 11, 7),
(3, 88, 9),
(4, 91, 4);

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
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comments_in_event`
--
ALTER TABLE `comments_in_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `event_assignments`
--
ALTER TABLE `event_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `list_products_event`
--
ALTER TABLE `list_products_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `list_product_request`
--
ALTER TABLE `list_product_request`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `replies_comments`
--
ALTER TABLE `replies_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

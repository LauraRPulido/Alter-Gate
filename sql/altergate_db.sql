-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-06-2025 a las 21:56:07
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
-- Base de datos: `altergate_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_tb`
--

CREATE TABLE `articulos_tb` (
  `id` int(11) NOT NULL,
  `nombre_art` varchar(100) NOT NULL,
  `descripcion_art` text NOT NULL,
  `enlace_art` varchar(200) NOT NULL,
  `img_art` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_estilo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_tb`
--

INSERT INTO `articulos_tb` (`id`, `nombre_art`, `descripcion_art`, `enlace_art`, `img_art`, `id_user`, `id_estilo`) VALUES
(5, 'Vestido Lolita JSK 3 Layer Cake - Negro x Negro', '\r\nVestido de algodón de tirantes con forro interior. Adornado con puntilla y lazo posterior.\r\nEspalda completamente elástica.\r\n65% Algodón, 35% poliéster.\r\nInformación de tallas y medidas más abajo.', 'https://www.madamechocolat-shop.com/es/vestidos/15079-23141-vestido-lolita-jsk-3-layer-cake-negro-x-negro.html#/30-talla-s', 'vestido-lolita-jsk-3-layer-cake-negro-x-negro.jpg', 5, 4),
(6, 'Blusa Lolita Milk Tea en Negro - Infanta', 'Blusa de manga larga de algodón con textura con encaje y lazada.\r\n65% algodón, 35% poliéster\r\n\r\nTalla única. S a L aprox.', 'https://www.madamechocolat-shop.com/es/tops-y-camisetas/16184-blusa-lolita-milk-tea-en-negro-infanta.html', 'blusa-lolita-milk-tea-en-negro-infanta.jpg', 5, 4),
(7, 'Vestido Gothic Amane Negro - Dark in Love', 'Artículo original DARK IN LOVE\r\nVestido de tirantes en tela con efecto telaraña. Cremallera trasera. \r\n95% Poliéster, 5% Spandex\r\n\r\nInformación de tallas y medidas más abajo.', 'https://www.madamechocolat-shop.com/es/vestidos/15083-22888-vestido-gothic-amane-negro-dark-in-love.html#/119-talla-xs', 'vestido-gothic-amane-negro-dark-in-love.jpg', 5, 4),
(8, 'Botas The Amygdala Negro - Koi', 'Botas altas de cordones con suela de plataforma con tacón. Adornadas con cadenas y adornos. Cremallera lateral. Tacón 14cm. Realizados en PU.\r\n\r\nTodos los procesos y materiales son vegan friendly.', 'https://www.madamechocolat-shop.com/es/zapatos/15266-22817-botas-the-amygdala-negro-koi.html#/454-talla_zapato-39_uk6', 'botas-the-amygdala-negro-koi.jpg', 5, 4),
(9, 'Peluche con Cadena Bear Shibari en Negro - Punk Rave', 'Peluche decorativo con detalles de cuerdas y arneses. Incluye una cadena desmontable para poder llevarlo.\r\nEste artículo no es un bolso, es un complemento meramente ornamental.', 'https://www.madamechocolat-shop.com/es/peluches/16173-peluche-con-cadena-bear-shibari-en-negro-punk-rave.html', 'peluche-con-cadena-bear-shibari-en-negro-punk-rave.jpg', 5, 4),
(10, 'Calentadores Romantic Bloom - Punk Rave', 'Calentadores semitransparentes negros de varias capas.\r\nMateriales: 100% poliéster.\r\n\r\nLa modelo mide 175cm.\r\n\r\nInformación de tallas más abajo.', '', 'calentadores-romantic-bloom-punk-rave.jpg', 5, 4),
(11, 'Zapatos Mary Jane Dark Delights - Koi', 'Zapatos mary jane de tacón y ligera plataforma. Acabado mate. Adornado con lazo y volantes de organza. Hebilla decorada con brillantes.\r\nPlataforma 7.6cm', 'https://www.madamechocolat-shop.com/es/zapatos/15518-24077-zapatos-mary-jane-dark-delights-koi.html#/456-talla_zapato-37_uk4', 'zapatos-mary-jane-dark-delights-koi.jpg', 5, 4),
(12, 'Falda Midi de Punto Calado Widows Prey - Killstar', 'Falda larga de punto calado elástico. Abertura lateral.\r\n100% acrílico', 'https://www.madamechocolat-shop.com/es/faldas-y-pantalones/14345-21086-falda-midi-de-punto-calado-widows-prey-killstar.html#/34-talla-xl', 'falda-midi-de-punto-calado-widows-prey-killstar.jpg', 5, 4),
(13, 'Pantalón de Campana Elsie - Minga London', 'Pantalón tejano de campana con bolsillos y detalles metálicos.\r\nMateriales: 75% algodón, 23% poliéster, 2% spándex.', 'https://www.madamechocolat-shop.com/es/faldas-y-pantalones/16137-24544-pantalon-de-campana-elsie-minga-london.html#/633-talla-24', 'pantalon-de-campana-elsie-minga-london.jpg', 6, 2),
(14, 'Top sin Mangas Elix - Minga London', 'Camiseta sin mangas con estampado.\r\n100% algodón.', 'https://www.madamechocolat-shop.com/es/tops-y-camisetas/16133-24529-top-sin-mangas-elix-minga-london.html#/119-talla-xs', 'top-sin-mangas-elix-minga-london.jpg', 6, 4),
(15, 'Mochila Evil Bear de Tartán Rojo y Negro', 'Mochila en forma de animal adornada con cremalleras y tachuelas.\r\nAbertura con cremallera trasera. Tirantes ajustables.', 'https://www.madamechocolat-shop.com/es/bolsos-y-mochilas/15723-mochila-evil-bear-de-tartan-rojo-y-negro.html', 'mochila-evil-bear-de-tartan-rojo-y-negro.jpg', 6, 2),
(16, 'Bambas Chunky de Plataforma Charcoal Metamorphosis - Koi Footwear', 'Bambas de plataforma con acentos plateados, cordones y blonda frontal.\r\nTodos los materiales y procesos son veganos.', 'https://www.madamechocolat-shop.com/es/zapatos/16065-24396-bambas-chunky-de-plataforma-charcoal-metamorphosis-koi-footwear.html#/456-talla_zapato-37_uk4', 'bambas-chunky-de-plataforma-charcoal-metamorphosis-koi-footwear.jpg', 6, 2),
(17, 'Camiseta Grim Fusion - KILLSTAR', 'Camiseta muy suave de manga corta con estampado de un rostro.\r\nMateriales: 100% algodón.', 'https://www.madamechocolat-shop.com/es/tops-y-camisetas/15939-24045-camiseta-grim-fusion-killstar.html#/30-talla-s', 'camiseta-grim-fusion-killstar.jpg', 6, 2),
(18, 'pantalones-punk-chains-tartan-morado', 'Pantalones de estampado tartán con serigrafía', '', 'pantalones-punk-chains-tartan-morado.jpg', 6, 2),
(19, 'Falda de Tartán Avril en Fucsia - Punk Rave', 'Mini falda de tartán con detalles de rejilla y encaje.\r\nMateriales: 90% Poliéster, 10% viscosa.', '', 'falda-de-tartan-avril-en-fucsia-punk-rave.jpg', 6, 2),
(20, 'bambas-con-plataforma-rimo-core-negro-koi', 'Zapatillas con plataforma ', '', 'bambas-con-plataforma-rimo-core-negro-koi.jpg', 6, 2),
(21, 'Top de Tirantes Girl\'s Clutter ~ Frutiger Aero', 'Top de tirantes elástico con estampado digital. Tela de tacto suave.\r\n97% poliéster, 3% spandex\r\nFabricado en Barcelona', '', 'top-de-tirantes-girl-s-clutter-frutiger-aero.jpg', 7, 3),
(22, 'Camiseta Oversize Girl\'s Clutter ~ Souvenir', 'Camiseta de corte oversize con cuello ancho. Estampado digital. \r\nLas tallas grandes son plus size-friendly\r\nEstampado en España. 100% algodón orgánico certificado. ', '', 'camiseta-oversize-girl-s-clutter-souvenir.jpg', 7, 3),
(23, 'Bambas de Plataforma Vainilla Frozen Shores Mega Chunky - Koi ', 'Bambas de plataforma con doble cordón y detalles de blonda frontal.\r\nTodos los procesos y materiales son veganos.', '', 'bambas-de-plataforma-vainilla-frozen-shores-mega-chunky-koi-footwear.jpg', 7, 3),
(24, 'Bambas de Plataforma Kaleidoscopic - Koi Footwear', 'Bambas de plataforma con cordones y acentos de color arcoíris.\r\nTodos los procesos y materiales son veganos.', '', 'bambas-de-plataforma-kaleidoscopic-koi-footwear.jpg', 7, 3),
(25, 'Bolso Bandolera Girl\'s Clutter ~ Sons de Primavera', 'Bolso estilo bandolera. Realizado en tela con estampado digital, adornado con charms e incluye dos chapas a conjunto.\r\nCierre con cremallera y forro interior. Materiales: Tela 1 Sarga de Poliéster 100% / Tela 2 Denim de Algodón 100% / Forro 100% Algodón\r\nFabricado en Barcelona', '', 'bolso-bandolera-girl-s-clutter-sons-de-primavera.jpg', 7, 3),
(26, 'Top de Terciopelo City Elf Rosa Dusty - Rose Island', 'Top de tirantes de terciopelo elástico muy suave, adornado con puntilla.\r\nPoliéster, algodón y materiales diversos.', '', 'top-de-terciopelo-city-elf-rosa-dusty-rose-island.jpg', 7, 3),
(27, 'Bolero de Punto Tilly - Minga London', 'Bolero de punto de manga larga ancha. En gris y rosa.\r\n100% acrílico', '', 'bolero-de-punto-tilly-minga-london.jpg', 7, 3),
(28, 'Cinturón con Brillantes Crown Pink Leopard', 'Cinturón de polipiel y metal con brillantes. Polipiel con animal print. Diseño reforzado.\r\n\r\n100% PU & metal', '', 'cinturon-con-brillantes-crown-pink-leopard.jpg', 7, 3),
(29, 'Bermudas Cyber - Minga London', 'Denim Bermuda shorts with neo-tribal motifs.\r\nMaterials: 70% cotton, 30% polyester.', '', 'bermudas-cyber-minga-london.jpg', 8, 1),
(30, 'Pantalón Punk Fallen Taboo en Negro - Jill Punk', 'Pantalones con bolsillos, detalles metálicos y printeado.\r\nMateriales: 65% algodón, 35% poliéster.', '', 'pantalon-punk-fallen-taboo-en-negro-jill-punk.jpg', 8, 1),
(31, 'Pantalón Denim Cargo Ancho Trek Gris Oscuro - Minga London', 'Pantalón gris oscuro desmontable con bolsillos y tiras removibles.\r\nMateriales: 85% algodón, 15% poliéster', '', 'pantalon-denim-cargo-ancho-trek-gris-oscuro-minga-london.jpg', 8, 1),
(32, 'Pantalones Fuse Negro x Rosa - Poizen Industries', 'Pantalones en lona negra con adornos de cremalleras, lazos rosas y correas.\r\nMateriales: 58% Algodón 39% Poliéster 3% Elastano', '', 'pantalones-fuse-negro-x-rosa-poizen-industries.jpg', 8, 1),
(33, 'Top de Manga Larga Skullbound - Minga London', 'Top de manga larga ajustado. Efecto acid wash y estampado.\r\n95% algodón, 5% Elastano', '', 'top-de-manga-larga-skullbound-minga-london.jpg', 8, 1),
(34, 'Top de Gasa Spectrum - Minga London', 'Top de manga larga ajustado de gasa semitransparente con estampado.\r\n95% poliéster, 5% elastano', '', 'top-de-gasa-spectrum-minga-london.jpg', 8, 1),
(35, 'Jersey de Punto Thorns en Negro - Minga London', 'Jersey de punto oversize con motivos neotribales.\r\nMateriales: 100% algodón', '', 'jersey-de-punto-thorns-en-negro-minga-london.jpg', 8, 1),
(36, 'Camiseta Baby Tee Occult - Minga London', '\r\nTop de manga corta ajustado con estampado.\r\nMateriales: 100% algodón', '', 'camiseta-baby-tee-occult-minga-london.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colecciones_tb`
--

CREATE TABLE `colecciones_tb` (
  `id` int(11) NOT NULL,
  `nombre_coleccion` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_estilo` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colecciones_tb`
--

INSERT INTO `colecciones_tb` (`id`, `nombre_coleccion`, `descripcion`, `imagen`, `id_estilo`, `id_user`) VALUES
(6, 'Razzmatazz', '🖤 Bold. Dark. Yours.', 'imagenColRazzmatazz.jpg', 4, 5),
(7, 'Gothotel', 'Una estancia eterna en el lado más glamuroso del gótico. Siluetas estructuradas, cueros oxidados y encajes decadentes. Tu habitación está lista... ¿te atreves a quedarte?', 'ColeccionGoth.jpg', 4, 5),
(8, 'Wilder x Sona', 'Punk sin pedir perdón\r\n\r\nEsta colección es un caos controlado: rotos a propósito, cadenas oxidables y estampados que gritan. Jeans customizados, chaquetas de cuero con graffiti y camisas destrozadas. No es moda, es anarquía vestida.\r\n\r\n🔥 Rompe las reglas. Usa el desorden.', 'imagenColWilder.jpeg', 2, 6),
(9, 'Corpse Punk', 'Muerto... pero fabuloso\r\n\r\nRompe convenciones con esta fusión post-mortem y punk. Siluetas desgarradas, tejidos envejecidos artificialmente y detalles DIY macabros (sí, esos \"parches\" parecen auténticas vendas de momia).\r\n\r\n🖤 Porque el punk nunca muere... pero tú podrías intentarlo.', 'imagenColCorpse.jpeg', 2, 6),
(10, 'Girlz Have Fun', '✨ Y2K pero con actitud\r\n\r\nEsta colección es un viaje sin frenos al 2000: mini skirts de cuero sintético, tops de malla brillante y jeans low-rise con detalles bling-bling. Colores Barbie-core, logos retro y accesorios que parecen sacados de un chat de MSN.\r\n\r\n💖 Porque la moda debería ser divertida, irreverente y un poco caótica.\r\n\r\n#GIRLZHAVEFUN', 'imagenColGirlz.jpg', 3, 7),
(11, 'Wiggle', '🌈 Porque la moda debe ser divertida, sexy y sin remordimientos.\r\n\r\n#DOITWITHAWIGGLE', 'imagenColWiggle.jpg', 3, 7),
(12, 'Alt Gore', 'Esta colección emo revive los 2000 con sudaderas oversize de bandas, skinny jeans rotos y chaquetas con parches de lyrics tristes. Detalles en hot pink y negro, y muchos, muchos safety pins.', 'imagenColAlt.jpg', 1, 8),
(13, 'TEARDRIP', 'Revive la esencia emo con sudaderas oversize estampadas con letras de canciones rotas, skinny jeans ajustados y chaquetas de mezclilla llenas de pins de bandas. Detalles en negro, morado oscuro y rosas apagados, con telas rasgadas y cinturones de correas.', 'coleccionEmo.jpg', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_articulo_tb`
--

CREATE TABLE `coleccion_articulo_tb` (
  `id` int(11) NOT NULL,
  `id_coleccion` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coleccion_articulo_tb`
--

INSERT INTO `coleccion_articulo_tb` (`id`, `id_coleccion`, `id_articulo`) VALUES
(17, 6, 11),
(18, 6, 7),
(19, 6, 6),
(20, 6, 5),
(25, 7, 12),
(26, 7, 10),
(27, 7, 9),
(28, 7, 8),
(29, 8, 20),
(30, 8, 18),
(31, 8, 17),
(32, 8, 15),
(33, 9, 20),
(34, 9, 16),
(35, 9, 14),
(36, 9, 13),
(37, 10, 28),
(38, 10, 25),
(39, 10, 22),
(40, 10, 21),
(41, 11, 27),
(42, 11, 26),
(43, 11, 24),
(44, 11, 23),
(45, 12, 34),
(46, 12, 33),
(47, 12, 32),
(48, 12, 31),
(49, 13, 36),
(50, 13, 35),
(51, 13, 30),
(52, 13, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos_tb`
--

CREATE TABLE `estilos_tb` (
  `id` int(11) NOT NULL,
  `nombre_estilo` varchar(50) NOT NULL,
  `icono` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estilos_tb`
--

INSERT INTO `estilos_tb` (`id`, `nombre_estilo`, `icono`) VALUES
(1, 'Emo', 'iconEmo-min.jpg'),
(2, 'Punk', 'iconPunk-min.jpg'),
(3, 'Y2K', 'iconY2K-min.png'),
(4, 'Gótico', 'iconGoth-min.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_tb`
--

CREATE TABLE `noticias_tb` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias_tb`
--

INSERT INTO `noticias_tb` (`id`, `titulo`, `subtitulo`, `contenido`, `id_user`, `fecha`, `imagen`) VALUES
(3, 'Oscuridad y Elegancia Dominan las Pasarelas', 'Mientras las tendencias retro y alternativas siguen conquistando el streetwear, el estilo gótico resurge con fuerza este año, reinventándose con toques modernos. ', 'Marcas independientes y diseñadores emergentes están liderando el movimiento, combinando siluetas victorianas, tejidos siniestros y accesorios dramáticos con un enfoque contemporáneo.\r\n\r\nTendencias Clave:\r\nGótico Glam: Terciopelos bordados, corsés con detalles metalizados y transparencias jugando con la sensualidad oscura.\r\n\r\nTech-Noir: Incorporación de elementos futuristas, como cortes asimétricos y textiles reflectantes, para un cyber goth 2.0.\r\n\r\nSostenibilidad Macabra: Cuero vegano en negro profundo y reciclaje de prendas vintage para un guardarropa eco-friendly y tenebroso.\r\n\r\n¿Por qué ahora? Las redes sociales, especialmente TikTok e Instagram, han impulsado el interés por la estética oscura, con hashtags como #DarkFashion superando millones de vistas. Además, celebridades como Billie Eilish y Jenna Ortega han adoptado looks góticos en eventos, normalizando su influencia en la moda mainstream.\r\n\r\n\"El gótico ya no es solo un subgénero; es una declaración de autenticidad y poder\", afirma la diseñadora Luna Vex de Falling Nerve.\r\n\r\n¿Listo para abrazar la sombra? 🖤', 5, '2025-06-07 22:00:00', 'noticiaGótica.webp'),
(4, '¡El Punk No Ha Muerto! La Moda Rebelde Regresa', 'Mientras la moda rápida satura las calles con looks repetitivos, el estilo punk resurge como un grito de libertad, reinventándose para una nueva generación. Desde las pasarelas underground hasta las redes sociales, la actitud DIY (\"hazlo tú mismo\") y los ', 'Tendencias Punk 2024:\r\nDestroyed Everything: Jeans con rasgaduras extremas, camisas con safety pins y chaquetas de cuero customizadas con pintura en spray.\r\n\r\nCyberpunk Rebellion: Toques futuristas como cables expuestos en accesorios y tejidos reflectantes en prendas riot grrrl.\r\n\r\nNeon Anarchy: Estampados ácidos y lemas provocadores en neón, inspirados en los años 80 pero con un twist 2.0.\r\n\r\n¿Por qué ahora? Artistas como Machine Gun Kelly y Willow Smith están reviviendo la estética, mientrascolecciones independientes como CORPSE PUNK y WILDER x SONA la llevan a lo extremo. \"El punk ya no es solo música; es una resistencia visual\", dice el diseñador Jax Void.\r\n\r\n📢 ¿La regla principal? No hay reglas.', 6, '2025-06-07 22:00:00', 'noticiaPunk.jpg'),
(5, 'El efecto 2000 de la moda', 'EL Y2K es el nombre del temido fallo informático (que nunca sucedió) con el cambio de milenio. Y es el nombre también de las tendencias que se inspiran en los looks del año 2000', 'Piensa, aunque no los hayas vivido, en los días previos a la noche del 31 de diciembre del año 1999. Con la entrada del nuevo milenio, solo se hablaba del «efecto 2000» o Y2K: los informáticos temían un gran fallo en los ordenadores con la llegada del 2000 que provocaría una gran crisis mundial. Los presagios no se cumplieron. Se tomaron las uvas y se vio la capa negra de Ramón García, como siempre. Los recuerdos de esa época vuelven ahora para recuperar, no el efecto informático del año 2000, sino la moda de comienzos del nuevo milenio.', 7, '2025-06-07 22:00:00', 'noticia2000.webp'),
(6, 'El efecto Vuelve ‘scene’, la primera tribu urbana del siglo XXI de la moda', 'Un puñado de ‘influencers’ y antihéroes recuperan la estética y el sonido característicos del movimiento que llenó de maquillaje, hedonismo y espíritu ‘hazlo tú mismo’ los primeros dosmiles', 'Lo scene, “la escena” nació a principios de los dosmiles como una digievolución de la subcultura emo que prendió primero entre adolescentes estadounidenses para extenderse por todo el mundo. La música de raíces hardcore punk de los inicios fue haciendo sitio a sonidos electrónicos, mientras que la estética dejaba atrás lo gótico y el bajón para incorporar colores flúor, cortes de pelo asimétricos, piercings, muñequeras, camisetas ajustadas y pantalones pitillo. Unos códigos que convertían lo scene en algo exclusivamente juvenil: se puede intentar ser indie o heavy pasados los treinta, pero es más fácil encontrar un alquiler a precio razonable en el centro de tu ciudad que a un emo cuarentón.', 8, '2025-06-07 22:00:00', 'noticiaPortadaEmo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tb`
--

CREATE TABLE `users_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enlace` varchar(200) NOT NULL,
  `imgUser` varchar(200) NOT NULL,
  `bio` varchar(160) NOT NULL,
  `likes` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_tb`
--

INSERT INTO `users_tb` (`id`, `username`, `password`, `enlace`, `imgUser`, `bio`, `likes`) VALUES
(5, 'Emilio Fernández', '$2y$10$B8BP35Z67L0RL6jg1Xg2oetvNDp04F3Xd.aAttiRbhzcxjUj40Sr6', 'https://www.infojobs.net/', 'diseñadorEmilio.jpg', '\"Rompiendo esquemas con diseños audaces y tejidos vanguardistas. La moda es arte y yo pinto con tela.\"', 0),
(6, 'Davina Dylan', '$2y$10$YMDS4diZpA.EyUZZtwItm.v9zGZxT.dwoazmPxCuaONF0R6ycTxbe', 'https://www.infojobs.net/', 'diseñadorDavina-min.jpg', '\"Rompiendo reglas con diseños punk, rasgaduras intencionales y un toque gótico. La moda debe incomodar. 💀✂️\"', 0),
(7, 'Luna G', '$2y$10$mgJcu99cW5nETErRn39PyeoIuKxfA8bOvL0PQZLW9L2zxNZ//rzW2', 'https://www.infojobs.net/', 'diseñadorLunaG-min.jpg', 'Diseñadora de moda apasionada por crear piezas únicas que fusionan innovación y tradición. Cada diseño cuenta una historia ✨ #Moda #Diseño #Creatividad', 0),
(8, 'Ron Slice', '$2y$10$J57L3zOpZycZm8MKZI0GteIrxX/OJJ3I2cF5YNf3pw8nd2HENILqO', 'https://www.infojobs.net/', 'diseñadorRon.webp', 'Coser emociones en tela: moda emo donde lo frágil se vuelve fuerte. Siluetas dramáticas, negro... y un toque de esperanza rota', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_tb`
--
ALTER TABLE `articulos_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estilo` (`id_estilo`);

--
-- Indices de la tabla `colecciones_tb`
--
ALTER TABLE `colecciones_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colecciones_tb_estilos_tb` (`id_estilo`),
  ADD KEY `colecciones_tb_users_tb` (`id_user`);

--
-- Indices de la tabla `coleccion_articulo_tb`
--
ALTER TABLE `coleccion_articulo_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coleccion` (`id_coleccion`),
  ADD KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `estilos_tb`
--
ALTER TABLE `estilos_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias_tb`
--
ALTER TABLE `noticias_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos_tb`
--
ALTER TABLE `articulos_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `colecciones_tb`
--
ALTER TABLE `colecciones_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `coleccion_articulo_tb`
--
ALTER TABLE `coleccion_articulo_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `estilos_tb`
--
ALTER TABLE `estilos_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias_tb`
--
ALTER TABLE `noticias_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos_tb`
--
ALTER TABLE `articulos_tb`
  ADD CONSTRAINT `articulos_tb_ibfk_1` FOREIGN KEY (`id_estilo`) REFERENCES `estilos_tb` (`id`);

--
-- Filtros para la tabla `colecciones_tb`
--
ALTER TABLE `colecciones_tb`
  ADD CONSTRAINT `colecciones_tb_estilos_tb` FOREIGN KEY (`id_estilo`) REFERENCES `estilos_tb` (`id`),
  ADD CONSTRAINT `colecciones_tb_users_tb` FOREIGN KEY (`id_user`) REFERENCES `users_tb` (`id`);

--
-- Filtros para la tabla `coleccion_articulo_tb`
--
ALTER TABLE `coleccion_articulo_tb`
  ADD CONSTRAINT `coleccion_articulo_tb_ibfk_1` FOREIGN KEY (`id_coleccion`) REFERENCES `colecciones_tb` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coleccion_articulo_tb_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulos_tb` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias_tb`
--
ALTER TABLE `noticias_tb`
  ADD CONSTRAINT `noticias_tb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

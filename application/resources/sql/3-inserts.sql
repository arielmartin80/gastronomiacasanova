
use databaseGC;
TRUNCATE TABLE comercio;
TRUNCATE TABLE items;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `razonSocial`, `puntoDeVenta`, `categoria`, `zonaCobertura`, `tiempo_estimado`,`tel`,`mailto`,`activo`) VALUES
(1, 'Burger King', 'Rivadavia 1024, caba', 'Hamburgueseria', 'A', 20, '011 555 55555', 'burguer@king.com', 1),
(2, 'Kentucky', 'Av. de Mayo 567, Ramos Mejía', 'Pizzeria', 'B', 45, '011 222 22222', 'kentucky@live.com', 1),
(3, 'Freddo', 'Peru 345, caba', 'Heladeria', 'C', 15, '011 333 33333', 'freddo@gmail.com', 1),
(4, 'Fabric', 'Florencio Varela 1900, San Justo', 'Sushi', 'D', 30, '11-777-4444', 'fabric@hotmail.com', 1);

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `nombre`, `descripcion`, `precio`, `id_comercio`) VALUES
(1, 'Combo BK Nuggets (10 piezas)', 'Diez unidades de pollo rebozados en pan rallado junto con una bebida y una papas fritas regulares.', 240.00, 1),
(2, 'Combo WHOPPER', 'Carne Whopper a la parrilla, tomate, lechuga, cebolla, pepinos, ketchup y mayonesa. Junto con una bebida y una papas fritas regulares.', 260.00, 1),
(3, 'Combo BK Stacker XL Rodeo', 'Tres carnes Whopper, pan especial, panceta, queso cheddar, aros de cebolla y salsa especial. Con bebida y papas fritas regulares.', 310.00, 1),
(4, 'Combo Long clasico', 'Dos carnes a la parrilla, salsa cheddar, mayonesa, lechuga y tomate. Junto con una bebida y una papas fritas regulares.', 215.00, 1),
(5, ' Pizza Bosque Green', 'Salsa de tomate, muzarella, jamon cocido y rucula', 288.00, 2),
(6, 'Pizza americana', 'Salsa de tomate, huevos fritos y panceta', 360.00 , 2),
(7, 'Pizza con jamon crudo y rucula', 'Salsa de tomate, muzarella, jamon crudo, rucula y queso parmesano', 348.00, 2),
(8, 'Pizza napolitana', 'Salsa de tomate, muzarella, jamon cocido y rodajas de tomate', 320.00, 2),
(9, 'Dos salmones roll', 'Salmon y palta por dentro, spicy salmon sellado por fuera, con nuestra salsa nikkei.', 300.00, 4),
(10, 'Arrolladitos primavera de verdura (2 unidades)', 'Rellenos de riquisimos vegetales.', 80.00, 4),
(11, 'Spring roll', 'Langostino, palta y phila, con verdeo por fuera.', 280.00, 4),
(12, 'Helado 1/4 kg', 'Dulce de leche Vauquita - con trocitos de tableta Vauquita y Sambayon.', 140.00, 3),
(13, 'Helado 1/2 kg', 'Chocolate blanco y Mascarpone - con frambuesa de la Patagonia ', 260.00, 3),
(14, 'Helados 1 kg', 'Chocolate Alpino - con cognac y nueces de Famatina, La Rioja, Tiramisu y Tramontana', 440.00, 3);




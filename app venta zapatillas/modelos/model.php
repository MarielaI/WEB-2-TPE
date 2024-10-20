<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
"mysql:host=".MYSQL_HOST .
";dbname=".MYSQL_DB.";charset=utf8", 
MYSQL_USER, MYSQL_PASS);
$this->deploy();
    }
    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL,
  `importador` varchar(100) NOT NULL,
  `pais origen` varchar(100) NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre_marca`, `importador`, `pais origen`, `cantidad`) VALUES
(1, 'TOPPER', 'Juan Garcia', 'ARGENTINA', 25),
(2, 'ADIDAS', 'Los imports srl', 'Malasia', 30),
(11, 'Nike', 'Importadores Asociados', 'USA', 18),
(12, 'PUMA', 'Juan Garcia', 'China', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(100) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nombre_modelo` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `precio` int(10) NOT NULL,
  `material` varchar(10) DEFAULT NULL,
  `talle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca`, `nombre_modelo`, `img`, `precio`, `material`, `talle`) VALUES
(6, 11, 'Air zoom', 'https://nikearprod.vtexassets.com/arquivos/ids/809690-800-800?width=800&height=800&aspect=true', 211000, 'sintetico', 41),
(24, 11, 'Urban', 'https://coppelar.vtexassets.com/arquivos/ids/1988292-800-auto?v=638448113503630000&width=800&height=auto&aspect=true', 189000, 'sinteticos', 36),
(31, 11, 'Jordan', 'https://nikearprod.vtexassets.com/arquivos/ids/810318-800-800?width=800&height=800&aspect=true', 5000000, 'sintetico', 41),
(33, 1, 'Classic', 'https://johnfoosar.vtexassets.com/arquivos/ids/166487-800-auto?v=638568346803770000&width=800&height=auto&aspect=true', 100000, 'lona goma', 37),
(54, 11, 'Air Force', 'https://www.tripstore.com.ar/media/catalog/product/cache/4769e4d9f3516e60f2b4303f8e5014a8/F/B/FB8878-200_0_13.jpg', 250000, NULL, 42),
(57, 1, 'Urban', 'https://media2.solodeportes.com.ar/media/catalog/product/cache/7c4f9b393f0b8cb75f2b74fe5e9e52aa/z/a/zapatillas-puma-caven-2-0-mujer-crudo-89067380-640010394915005-1.jpg', 219000, 'cuero', 36),
(72, 12, 'Palermo', 'https://images.puma.net/images/396463/02/sv01/fnd/ARG/w/600/h/600/', 310000, 'piel goma', 37),
(73, 1, 'Nova Low', 'https://http2.mlstatic.com/D_NQ_NP_641703-MLA73775223703_012024-O.webp', 310000, 'lona goma', 37),
(115, 11, 'SB Dunk Pro Premium', 'https://nikearprod.vtexassets.com/arquivos/ids/995654-1600-1600?width=1600&height=1600&aspect=true', 211000, 'espuma int', 45),
(129, 2, 'Samba OG', 'https://www.moov.com.ar/on/demandware.static/-/Sites-365-dabra-catalog/default/dwa7cb705c/products/ADIH4879/ADIH4879-1.JPG', 256000, 'mat sofist', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre_us` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_us`, `password`) VALUES
(0, 'webadmin', '$2y$10$zKCpTbpN0ZTY527bfCfKReQEP1Guvcu2k6CYRn5kDzZudh8fmuuYW');

		END;
$this->db->query($sql);
  }
}
}

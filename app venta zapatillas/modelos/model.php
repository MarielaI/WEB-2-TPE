<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
"mysql:host=".MYSQL_HOST .
";dbname=".MYSQL_DB.";charset=utf8", 
MYSQL_USER, MYSQL_PASS);
$this->deploy_marcas();
$this->deploy_modelos();
$this->deploy_usuarios();
    }
    private function _deploy_marcas() {
        $query = $this->db->query('SHOW TABLES LIKE marca');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL,
  `importador` varchar(100) NOT NULL,
  `pais origen` varchar(100) NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

		END;
$this->db->query($sql);
  }
}
 private function _deploy_modelos() {
        $query = $this->db->query('SHOW TABLES LIKE marca');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
CREATE TABLE `modelo` (
  `id_modelo` int(100) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nombre_modelo` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `precio` int(10) NOT NULL,
  `material` varchar(10) DEFAULT NULL,
  `talle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

		END;
$this->db->query($sql);
  }
}
 private function _deploy_usuarios() {
        $query = $this->db->query('SHOW TABLES LIKE marca');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre_us` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

		END;
$this->db->query($sql);
  }
}

}

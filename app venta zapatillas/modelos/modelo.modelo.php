<?php
class ModeloModelo {
    private $db;
    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_zapatillas;charset=utf8', 'root', ''); 
    } 
    public function getModelos() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM modelo');
        $query->execute();
           // 3. Obtengo los datos en un arreglo de objetos
        $modelos = $query->fetchAll(PDO::FETCH_OBJ); 
            return $modelos;
    }
     public function getModelo($id) {    
        $query = $this->db->prepare('SELECT modelo.*, marca.nombre_marca FROM modelo INNER JOIN marca on modelo.id_marca = marca.id WHERE id_modelo = ? ');
         $query->execute([$id]);   
         $modelo = $query->fetch(PDO::FETCH_OBJ);
           return $modelo;
    }
    public function getMarca($id) {    
        $query = $this->db->prepare('SELECT * FROM marca WHERE id = ?');
        $query->execute([$id]);   
        $marca = $query->fetch(PDO::FETCH_OBJ);
        return $marca;
    } 
    public function insertarModelo($id_marca, $nombre_modelo, $precio, $material, $talle) { 
        $query = $this->db->prepare('INSERT INTO modelo (id_marca, nombre_modelo, precio, material, talle) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$id_marca, $nombre_modelo, $precio, $material, $talle]);
            $id = $this->db->lastInsertId();
            return $id;
    }
     public function eliminarModelo($id) {
        $query = $this->db->prepare('DELETE FROM modelo WHERE id_modelo = ?');
        $query->execute([$id]);
    }
    public function actualizarModelo($nombre_modelo,$precio, $material, $talle, $id) {        
        $query = $this->db->prepare('UPDATE modelo SET nombre_modelo = ?,precio = ?, material = ?, talle = ? WHERE id_modelo = ?');
        $query->execute([$nombre_modelo,$precio,$material,$talle,$id]);
    }   
    
}
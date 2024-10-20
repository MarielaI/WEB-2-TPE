<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_zapatillas;charset=utf8', 'root', '');
    }
 
    public function getUserBynombre($nombre_us) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre_us = ?");
        $query->execute([$nombre_us]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}
<?php
require_once './app/modelos/modelo.modelo.php';
require_once './app/vistas/modelo.vista.php';

class ModeloControlador {
    private $modelo;
    private $vista;

    public function __construct($res) {
        $this->modelo = new ModeloModelo();
        $this->vista = new ModeloVista($res->user);
    }
     public function verModelos() {
        // obtengo los modelos de la DB
        $modelos = $this->modelo->getModelos();
        // mando los modelos a la vista
      return $this->vista->mostrarModelos($modelos);
   }
    public function verModelosAdmin() {
        // obtengo los modelos de la DB
        $modelos = $this->modelo->getModelos();
        // mando los modelos a la vista
        return $this->vista->mostrarModelosAdmin($modelos);
    }
    public function agregarModelo() {
        $modelos = $this->modelo->getModelos();
        $this->vista->verAltaModelo($modelos);
    }

    public function validarAgregarModelo(){
        if (!isset($_POST['id_marca']) || empty($_POST['id_marca'])) {
            return $this->vista->verAltaModelo('Falta completar la marca');
            }
        if (!isset($_POST['nombre_modelo']) || empty($_POST['nombre_modelo'])) {
            return $this->vista->verAltaModelo('Falta completar el nombre');
        }
    
        if (!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->vista->verAltaModelo('Falta completar el precio');
        }

        if (!isset($_POST['talle']) || empty($_POST['talle'])) {
            return $this->vista->verAltaModelo('Falta completar el talle');
        } 
        if (!isset($_POST['material']) || empty($_POST['material'])) {
            return $this->vista->showError('Falta completar el material');
        } 
        
        $id_marca = $_POST['id_marca'];
        $nombre_modelo = $_POST['nombre_modelo'];
        $precio = $_POST['precio'];
        $material = $_POST['material'];
        $talle = $_POST['talle'];
        
        $id = $this->modelo->insertarModelo($id_marca, $nombre_modelo, $precio, $material, $talle);          
        return $this->vista->verAbmOk("Operacion realizada");
    } 
    public function borrarModelo($id) {
        // obtengo el modelo por id
        $modelo = $this->modelo->getModelo($id);
               if (!$modelo) {
            return $this->vista->showError("No existe el modelo con el id=$id");
        }
        // borro el modelo y redirijo
        $this->modelo->eliminarModelo($id);
        return $this->vista->verAbmOk("Operacion realizada");
    }
    public function verDetalle($id) {
        // obtengo el modelo por id
        $modelo = $this->modelo->getModelo($id);
            if (!$modelo) {
            return $this->vista->showError("No existe el modelo con el id=$id");
        }
        //muestro el detalle del modelo: 
        $this->vista->verDetalleVista($modelo);
    }

       public function ModificarModelo($id) {
        $modelo = $this->modelo->getModelo($id);
        $this->vista->verModelo($modelo,'');
       }

        public function ValidarModificacion($id){
        $modelo = $this->modelo->getModelo($id);
            if (!$modelo) {
            return $this->vista->verModelo($modelo,"No existe el  con el id=$id");
        }
        
        if (!isset($_POST['nombre_modelo']) || empty($_POST['nombre_modelo'])) {
            return $this->vista->showError('Falta completar el nombre');
        }    
        if (!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->vista->showError('Falta completar el precio');
        }
        if (!isset($_POST['material']) || empty($_POST['material'])) {
            return $this->vista->showError('Falta completar el material');
        } 
        if (!isset($_POST['talle']) || empty($_POST['talle'])) {
            return $this->vista->showError('Falta completar el talle');
        }          
        
        $nombre_modelo = $_POST['nombre_modelo'];
        $precio = $_POST['precio'];
        $material = $_POST['material'];
        $talle = $_POST['talle'];
        $this->modelo->actualizarModelo($nombre_modelo,$precio, $material, $talle,$id);
        return $this->vista->verAbmOk("Operacion realizada");
    }  
}


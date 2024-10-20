<?php
class ModeloVista {
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function mostrarModelos($modelos) {
        // la vista define una nueva variable con la cantida de modelos
        $count = count($modelos);
        require 'templates/lista_publica_modelos.phtml';
    }
    public function mostrarModelosAdmin($modelos) {
        // la vista define una nueva variable con la cantida de modelos
        $count = count($modelos);
        require 'templates/lista_modelos.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function verAbmOk($operac_exitosa) {
        require 'templates/abm_ok.phtml';
    }
    public function verDetalleVista($modelo){
        require 'templates/detalle.phtml';
    }
    public function verAltaModelo($modelos,$error = ''){
        require 'templates/form_alta_modelo.phtml';
    }
        public function verModelo($modelo,$error = ''){
        require 'templates/form_editar_modelo.phtml';
    }
        
  }
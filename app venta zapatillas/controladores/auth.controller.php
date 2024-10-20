<?php
require_once './app/modelos/user.model.php';
require_once './app/vistas/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['nombre_us']) || empty($_POST['nombre_us'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $nombre_us = $_POST['nombre_us'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserBynombre($nombre_us);

        // password: 123456
        // $userFromDB->password: $2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC
        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['nombre_USER'] = $userFromDB->nombre_us;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo 
            header('Location: ' . BASE_URL . 'listaradmin');
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}


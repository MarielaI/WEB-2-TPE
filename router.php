<?php
require_once 'app/controladores/modelo.controlador.php';
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/validar.aut.middleware.php';
require_once 'app/controladores/auth.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
// tabla de ruteo

// listar  -> modeloControlador->vermodelo();
// agregar  -> modeloControlador->addmodelo();
// eliminar/:ID  -> modeloControlador->borrarModelo($id);
// modificar/:ID -> modeloControlador->modificarModelo($id);
// verDetalle/:ID -> modeloControlador->verDetalle($id); 

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
	sesionAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->verModelos();
        break;
    case 'listaradmin':
    sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->verModelosAdmin();
        break;
    case 'agregar':
	sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->agregarModelo();
        break;
        case 'validar_agregar':
    sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->validarAgregarModelo();
        break;
       case 'eliminar':
	sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->borrarModelo($params[1]);
        break;
    case 'modificar':
	sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->ModificarModelo($params[1]);
        break;
    case 'validar_modificacion':
    sesionAutMiddleware($res);
    validarAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->ValidarModificacion($params[1]);
        break;
    case 'verDetalle':
	sesionAutMiddleware($res);
        $controlador = new ModeloControlador($res);
        $controlador->verDetalle($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
    default: 
        echo "404 Page Not Found"; 
        break;
}
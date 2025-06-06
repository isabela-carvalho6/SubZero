<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/adm/AdmController.php';
require_once '../controllers/bar/BarController.php';
require_once '../controllers/bebida/BebidaController.php';
require_once '../controllers/feedback/FeedbackController.php';
require_once '../controllers/usuario/UsuarioController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$request = $_SERVER['REQUEST_URI'];
$rota = $_SERVER['REQUEST_URI'];

switch ($request) {
 
    case '/SubZero/public/adm/':
        $controller = new AdmController();
        $controller->showForm();
        break; 
        
    case '/SubZero/public/bar/':
        $controller = new BarController();
        $controller->showForm();
        break;

    case '/SubZero/public/bebida/':
        $controller = new BebidaController();
        $controller->showForm();
        break;

    case '/SubZero/public/feedback/':
        $controller = new FeedbackController();
        $controller->showForm();
        break;  
        
    case '/SubZero/public/usuario/':
        $controller = new UsuarioController();
        $controller->showForm();
        break;

    case '/SubZero/public/save-adm':
        $controller = new AdmController();
        $controller->saveAdm();
        break;

    case '/SubZero/public/save-bar':
        $controller = new BarController();
        $controller->saveBar();
        break;
        
    case '/SubZero/public/save-bebida':
        $controller = new BebidaController();
        $controller->saveBebida();
        break; 
        
    case '/SubZero/public/save-feedback':
        $controller = new FeedbackController();
        $controller->saveFeedback();
        break;
        
    case '/SubZero/public/save-usuario':
        $controller = new UsuarioController();
        $controller->saveUsuario();
        break;    

    case '/SubZero/public/list-adm':
        $controller = new AdmController();
        $controller->listAdm();
        break;

    case '/SubZero/public/list-bar':
        $controller = new BarController();
        $controller->listBar();
        break;

    case '/SubZero/public/list-bebida':
        $controller = new BebidaController();
        $controller->listBebida();
        break;

    case '/SubZero/public/list-feedback':
        $controller = new FeedbackController();
        $controller->listFeedback();
        break;

    case '/SubZero/public/list-usuario':
        $controller = new UsuarioController();
        $controller->listUsuario();
        break;

    case '/SubZero/public/delete-adm':
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->deleteAdm(); // <-- CORRETO!
        break;

    case '/SubZero/public/delete-bar':
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->deleteBarById(); // Troque para deleteBarById
        break;
        
    case '/SubZero/public/delete-bebida':
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->deleteBebidaByNome();
        break;
        
    case '/SubZero/public/delete-feedback':
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->deleteFeedbackById();
        break;
        
    case '/SubZero/public/delete-usuario':
        require_once '../controllers/usuario/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->deleteUsuarioById();
        break;    

    case (preg_match('/\/SubZero\/public\/update-adm\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->showUpdateForm($id); 
        break;

    case (preg_match('/\/SubZero\/public\/update-bar\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/SubZero\/public\/update-bebida\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/SubZero\/public\/update-feedback\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/SubZero\/public\/update-usuario\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/usuario/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->showUpdateForm($id);
        break;

    case '/SubZero/public/update-adm':
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->updateAdm();
        break;

    case '/SubZero/public/update-bar':
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->updateBar();
        break;

    case '/SubZero/public/update-bebida':
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->updateBebida();
        break;
    
    case '/SubZero/public/update-feedback':
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->updateFeedback();
        break;

    case '/SubZero/public/update-usuario':
        require_once '../controllers/usuario/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->updateUsuario();
        break;

    default:
        http_response_code(404);
        echo $request;
        echo "Página não encontrada.";
        break;

}

if ($rota === '/update-adm' && isset($_GET['id'])) {
    $controller = new AdmController();
    $controller->showUpdateForm($_GET['id']);
}

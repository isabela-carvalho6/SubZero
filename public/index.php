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




    case '/dev_pub/save-adm':
        $controller = new AdmController();
        $controller->saveAdm();
        break;

    case '/dev_pub/save-bar':
        $controller = new BarController();
        $controller->saveBar();
        break;
        
    case '/dev_pub/save-bebida':
        $controller = new BebidaController();
        $controller->saveBebida();
        break; 
        
    case '/dev_pub/save-feedback':
        $controller = new FeedbackController();
        $controller->saveFeedback();
        break;
        
    case '/dev_pub/save-usuario':
        $controller = new UsuarioController();
        $controller->saveUsuario();
        break;    




    case '/dev_pub/list-adm':
        $controller = new AdmController();
        $controller->listAdm();
        break;

    case '/dev_pub/list-bar':
        $controller = new BarController();
        $controller->listBar();
        break;

    case '/dev_pub/list-bebida':
        $controller = new BebidaController();
        $controller->listBebida();
        break;

    case '/dev_pub/list-feedback':
        $controller = new FeedbackController();
        $controller->listFeedback();
        break;

    case '/dev_pub/list-usuario':
        $controller = new UsuarioController();
        $controller->listUsuario();
        break;




    case '/dev_pub/delete-adm':
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->deleteAdmByNome();
        break;

    case '/dev_pub/delete-bar':
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->deleteBarById(); // Troque para deleteBarById
        break;
        
    case '/dev_pub/delete-bebida':
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->deleteBebidaByNome();
        break;
        
    case '/dev_pub/delete-feedback':
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->deleteFeedbackById();
        break;
        
    case '/dev_pub/delete-usuario':
        require_once '../controllers/usuario/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->deleteUsuarioById();
        break;    



        
    case (preg_match('/\/dev_pub\/update-adm\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->showUpdateForm($id); 
        break;

    case (preg_match('/\/dev_pub\/update-bar\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/dev_pub\/update-bebida\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/dev_pub\/update-feedback\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->showUpdateForm($id);
        break;

    case (preg_match('/\/dev_pub\/update-usuario\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1]; 
        require_once '../controllers/usuario/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->showUpdateForm($id);
        break;




    case '/dev_pub/update-adm':
        require_once '../controllers/adm/AdmController.php';
        $controller = new AdmController();
        $controller->updateAdm();
        break;

    case '/dev_pub/update-bar':
        require_once '../controllers/bar/BarController.php';
        $controller = new BarController();
        $controller->updateBar();
        break;

    case '/dev_pub/update-bebida':
        require_once '../controllers/bebida/BebidaController.php';
        $controller = new BebidaController();
        $controller->updateBebida();
        break;
    
    case '/dev_pub/update-feedback':
        require_once '../controllers/feedback/FeedbackController.php';
        $controller = new FeedbackController();
        $controller->updateFeedback();
        break;

    case '/dev_pub/update-usuario':
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

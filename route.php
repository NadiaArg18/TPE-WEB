<?php
require_once "Controller/SerieController.php";
require_once "Controller/LogInController.php";
require_once "Controller/CanalController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = 'home';
}

$params = explode('/', $action);

$seriesController = new SerieController();
$loginController = new LogInController();
$canalController = new CanalController();

switch ($params[0]){
    case 'login': 
        $loginController->login(); 
        break;
    case 'logout': 
        $loginController->logout(); 
        break;
    case 'verify': 
        $loginController->verifyLogin(); 
        break;
    case 'home':
        $seriesController->showHome();
        break;
    case 'crearSerie';
        $seriesController->crearSerie();
        break;
    case 'verSerie':
        $seriesController->traerSerie($params[1]);
        break;
    case 'borrarSerie':
        $seriesController->borrarSerie($params[1]);
        break;
    case 'editarSerie':
        $seriesController->editarSerie($params[1]);
        break;
    case 'home':
        $canalController->showHome();
        break;
    case 'crearSerie';
        $canalController->crearCanal();
        break;
    case 'verSerie':
        $canalController->traerCanal($params[1]);
        break;
    case 'borrarSerie':
        $canalController->borrarCanal($params[1]);
        break;
    case 'editarSerie':
        $canalController->editarCanal($params[1]);
        break;
    default:
        echo ('404 page not found');
        break;
}
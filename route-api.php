<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiSerieController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('series', 'GET', 'ApiComentariosController', 'obtenerComentarios');
$router->addRoute('series/:ID', 'DELETE', 'ApiComentariosController', 'eliminarComentario');
$router->addRoute('series', 'POST', 'ApiComentariosController', 'agregarComentario');
$router->addRoute('series/:ID', 'GET', 'ApiComentariosController', 'comentariosporSerie');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
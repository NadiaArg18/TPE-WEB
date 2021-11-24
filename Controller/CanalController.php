<?php
require_once "./Model/CanalModel.php";
require_once "./View/CanalView.php";
require_once "./Autenticacion/Autenticar.php";

class CanalController{

    private $model;
    private $view;
    private $autenticar;

    function __construct(){
        $this->model = new CanalModel();
        $this->view = new CanalView();
        $this->autenticar = new Autenticar();
    }

    function showHome(){
        $this->autenticar->checkLoggedIn();
        $canales = $this->model->traerCanales();
        $this->view->verCanales($canales);
    }

    function crearCanal(){
        $this->autenticar->checkLoggedIn();
        $this->model->agregarCanal($_POST['NombreCanal'], $_POST['id_canal']);
        $this->view->showHomeLocation(); #esto nos redirige a la home para que no nos de una pag vacia
    }

    function borrarCanal($id){
        $this->autenticar->checkLoggedIn();
        $this->model->borrarCanalFromDB($id);
        $this->view->showHomeLocation();
    }

    function editarCanal(){
        $this->autenticar->checkLoggedIn();
        $this->model->editarCanalFromDB($_POST['NombreCanal'], $_POST['id_canal']);
        $this->view->showHomeLocation();
    }
}

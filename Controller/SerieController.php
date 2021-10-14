<?php
require_once "./Model/SerieModel.php";
require_once "./View/SerieView.php";
//require_once "./Autenticacion/Autenticar.php";

class SerieController{

    private $model;
    private $view;
    private $autenticar;

    function __construct(){
        $this->model = new SerieModel();
        $this->view = new SerieView();
        //$this->autenticar = new Autenticar();
    }

    function showHome(){
        //$this->autenticar->checkLoggedIn();

        $series = $this->model->traerSeries();
        $this->view->verSeries($series); 
    }

    function crearSerie(){
        $this->model->agregarSerie($_POST['Nombre'],$_POST['Canal'],$_POST['Genero']);
        $this->view->showHomeLocation();
    }

    function borrarSerie($id){
        //$this->autenticar->checkLoggedIn();

        $this->model->borrarSerieFromDB($id);
        $this->view->showHomeLocation();
    }

    function editarSerie($id){
        //$this->autenticar->checkLoggedIn();

        $this->model->editarSerieFromDB($id);
        $this->view->showHomeLocation();
    }

    function traerSerie($id){
        //$this->autenticar->checkLoggedIn();

        $serie = $this->model->verSerie($id);
        $this->view->verSerie($serie); 
    }
}
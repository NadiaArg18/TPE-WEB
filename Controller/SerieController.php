<?php
require_once "./Model/SerieModel.php";
require_once "./Model/CanalModel.php";
require_once "./View/SerieView.php";
require_once "./Model/UserModel.php";
require_once "./Model/valoracionModel.php";
require_once "./Autenticacion/Autenticar.php";

class SerieController{

    private $SerieModel;
    private $CanalModel;
    private $SerieView;
    private $UserModel;
    private $valoracionModel;
    private $autenticar;

    function __construct(){
        $this->SerieModel = new SerieModel();
        $this->CanalModel = new CanalModel();
        $this->SerieView = new SerieView();
        $this->UserModel = new UserModel();
        $this->valoracionModel = new valoracionModel();
        $this->autenticar = new Autenticar();
    }

    function showHome(){
        $this->autenticar->checkLoggedIn();
        $series = $this->SerieModel->traerSeries();
        $canales = $this->CanalModel->traerCanales();
        $users = $this->UserModel->getUsers();
        $this->SerieView->verSeries($series, $canales, $users);
    }

    function crearSerie(){
        $this->autenticar->checkLoggedIn();
        $this->SerieModel->agregarSerie($_POST['nombreSerie'], $_POST['fk_id_Nombre'], $_POST['Canal'], $_POST['Genero']);
        $this->SerieView->showHomeLocation();
    }

    function borrarSerie($id){
        $this->autenticar->checkLoggedIn();
        $comentarios = $this->verValoracion($id);
        if($comentarios){
            $this->view->showError("No se puede eliminar porque tiene comentarios y puntaje.");
        } else{
            $this->SerieModel->borrarSerieFromDB($id);
            $this->SerieView->showHomeLocation();
        }   
    }

    function editarSerie(){
        $this->autenticar->checkLoggedIn();
        $this->SerieModel->editarSerieFromDB($_POST['id_Series'], $_POST['nombreSerie'], $_POST['fk_id_Nombre'], $_POST['Canal'], $_POST['Genero']);
        $this->SerieView->showHomeLocation();
    }

    function traerSerie($id){
        $this->autenticar->checkLoggedIn();
        $serie = $this->SerieModel->verSerie($id);
        $this->SerieView->verSerie($serie);
    }

    function verSerieCanal($canal){
        $serieporCanal = $this->SerieModel->obtenerSeriesporCanal($canal);
        $this->SerieView->serieporCanal($serieporCanal);
    }

    function verValoracion($id_Series){
        $valoraciones = $this->valoracionModel->showComentarios();
        foreach ($valoraciones as $comentarios){
            if ($comentarios->fk_id_Nombre === $id_Series){
                return true;
            }
        }
    }
}
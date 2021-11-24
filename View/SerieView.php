<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class SerieView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
  
    function verSeries($series, $canales){
        $this->smarty->assign('series', $series);
        $this->smarty->assign('canales', $canales);
        $this->smarty->display('templates/agregarSerie.tpl');
        $this->smarty->display('templates/showHome.tpl');
    }

    function verSerie($serie, $logeado){
        $this->smarty->assign('serie', $serie);
        $this->smarty->assign('logeado', $logeado);
        $this->smarty->display('templates/serieDetalles.tpl');
    }

    function serieporCanal($serieporCanal){
        $this->smarty->assign('serieporCanal', $serieporCanal);
        $this->smarty->display('templates/serieporCanal.tpl');
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

    function showLoginLocation(){
        header("Location: " . BASE_URL . "login");
    }
}


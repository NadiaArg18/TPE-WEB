<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class SerieView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
  
    function verSeries($series){
        $this->smarty->assign('series', $series);
        $this->smarty->display('templates/agregarSerie.tpl');
        $this->smarty->display('templates/serieTabla.tpl');
    }

    function verSerie($serie){
        $this->smarty->assign('serie', $serie);
        $this->smarty->display('templates/serieDetalles.tpl');
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

    function showLoginLocation(){
        header("Location: " . BASE_URL . "login");
    }
}


<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class CanalView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }  
  
    function verCanales($canales){
        $this->smarty->assign('canales', $canales);
        $this->smarty->display();
        $this->smarty->display();
    }

    function verCanal($canal){
        $this->smarty->assign('canal', $canal);
        $this->smarty->display();
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

    function showLoginLocation(){
        header("Location: " . BASE_URL . "login");
    }
}

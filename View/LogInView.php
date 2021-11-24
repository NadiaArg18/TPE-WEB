<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class LogInView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){ 
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/acceso.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }
    
    function editarPermisos($usuarios){
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('templates/editarPermisos.tpl');
    }
}


<?php

class Autenticar{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["Email"])){
            header("Location: ".BASE_URL."login");
        }
    }
}

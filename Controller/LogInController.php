<?php
//require_once "./Model/UserModel.php";
//require_once "./View/LogInView.php";

class LogInController {

    private $model;
    private $view;

    function __construct(){
        //$this->model = new UserModel();
        //$this->view = new LogInView();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function login(){
        //$this->view->showLogin();
    }

    function verifyLogin(){
        if (!empty($_POST['Email']) && !empty($_POST['Contraseña'])) {
            $email = $_POST['Email'];
            $contraseña = password_hash($_POST['Contraseña'], PASSWORD_BCRYPT);
        
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email, $contraseña);
     
            // Si el usuario existe y las contraseñas coinciden
            if($user && password_verify($contraseña, ($user->Contraseña))){

                session_start();
                $_SESSION["Email"] = $email;
                $_SESSION["Contraseña"] = $contraseña;
                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }
}
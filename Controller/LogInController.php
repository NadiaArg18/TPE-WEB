<?php
require_once "./Model/UserModel.php";
require_once "./View/LogInView.php";
require_once "./Autenticacion/Autenticar.php";

class LogInController{

    private $model;
    private $view;
    private $autenticar;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LogInView();
        $this->autenticar = new Autenticar();
    }

    function login(){
        $this->view->showLogin();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function verifyLogin(){
        if (!empty($_POST['Email']) && !empty($_POST['Contraseña'])) {
            $email = $_POST['Email'];
            $contraseña = $_POST['Contraseña'];
        }
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);

            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($contraseña, $user->Contraseña)) {

                session_start();
                $_SESSION["Email"] = $email;
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
    }

    // Registro user
    function registerUser(){
        $password = password_hash($_POST['Contraseña'], PASSWORD_BCRYPT);
        $exists = $this->existsUser($_POST['Email']);
        if($exists){
            $this->view->showHome();
        }
        $this->model->registration($_POST['Email'], $password);
        $this->view->showLogin("¡Registrado con exito!");
    }

    function existsUser($user){
        $lista = $this->model->getUsers();
        foreach ($lista as $list){
            if($list->email === $user){
                return true;
            }
        }
    }

    function eliminarUsuario($id){
        if($this->autenticar->esAdmin()){
            if(!empty($id)){
                $this->model->eliminarUsuario($id);
            }
        } else{
            $this->view->showHome();
        }   
    }

    function editarPermisos(){
        $usuarios = $this->model->getUsers();
        $this->view->editarPermisos($usuarios);
    }

    function editarRol(){
        if ($this->autenticar->esAdmin()){
            $email = $_POST['emailUsuario'];
            $rol = $_POST['rolUsuario'];
            if (!empty($email) && !empty($rol)){
                $this->model->editarPermiso($email, $rol);
            }
        } else{
            $this->View->showHome("No tenes permiso de realizar esta accion");
        }
    }
}
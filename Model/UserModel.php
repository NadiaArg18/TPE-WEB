<?php

class UserModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    // Registro usuario
    function registration($email, $contraseña){
        $obtener = $this->db->prepare("INSERT INTO usuarios(Email,Contraseña) VALUES(?,?)");
        $obtener->execute(array($email, $contraseña));
    }

    function getUsers(){
        $query = $this->db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function getUser($email){     
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE Email=?" );
        $query->execute(array($email));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function Administrador($admin, $id){
        $sentencia = $this->db->prepare("UPDATE usuarios SET Administrador=? WHERE id_Usuarios=?");
        $sentencia->execute(array($admin, $id));
    }

    function eliminarUsuario($id){
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_Usuarios=?");
        $query->execute(array($id));
    }

    function editarPermiso($email, $permiso){
        $query = $this->db->prepare("UPDATE usuarios SET rol=? WHERE Email=?");
        $query->execute(array($permiso, $email));
    }
}

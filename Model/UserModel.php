<?php

class UserModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    function getUser($email, $contraseña){     
        $query = $this->db->prepare('INSERT INTO usuarios (Email, Contraseña) VALUES (?,?)');
        $query->execute([$email, $contraseña]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}

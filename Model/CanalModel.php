<?php

class CanalModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    function traerCanales(){    
        $sentencia = $this->db->prepare( "SELECT * FROM canales");
        $sentencia->execute();
        $canales = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $canales;        
    }
    
    function verCanal($id){ 
        $sentencia = $this->db->prepare("SELECT * FROM canales WHERE id_canal=?");
        $sentencia->execute(array($id));
        $canal = $sentencia->fetch(PDO::FETCH_OBJ);
        return $canal;
    }

    function agregarCanal($NombreCanal, $id_canal){      
        $sentencia = $this->db->prepare("INSERT INTO canales (NombreCanal, id_canal) VALUES(?,?)");
        $sentencia->execute(array($NombreCanal, $id_canal));              
    }
    
    function borrarCanalFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM canales WHERE id_canal = ?");
        $sentencia->execute(array($id));
    }

    function editarCanalFromDB($id){
        $sentencia = $this->db->prepare("UPDATE canales WHERE id_canal=?");
        $sentencia->execute(array($id));
    }
}

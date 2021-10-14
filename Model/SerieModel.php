<?php

class SerieModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    function traerSeries(){    
        $sentencia = $this->db->prepare( "SELECT * FROM series");
        $sentencia->execute();
        $series = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $series; 
    }
    
    function verSerie($id){    
        $sentencia = $this->db->prepare("SELECT * FROM series WHERE id_Series=?");
        $sentencia->execute(array($id));
        $serie = $sentencia->fetch(PDO::FETCH_OBJ);
        return $serie;
    }

    function agregarSerie($Nombre,$Canal,$Genero){      
        $sentencia = $this->db->prepare("INSERT INTO series (Nombre, Canal, Genero) VALUES(?,?,?)");
        $sentencia->execute(array($Nombre,$Canal,$Genero));              
    }
    
    function borrarSerieFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM series WHERE series . id_Series = ?");
        $sentencia->execute(array($id));
    }

    function editarSerieFromDB($id){
        $sentencia = $this->db->prepare("UPDATE series SET Nombre, Canal, Genero WHERE series . id_Series VALUES(?,?,?)");
        $sentencia->execute(array($id));
        $series = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $series;
    }
}


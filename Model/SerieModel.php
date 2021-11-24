<?php

class SerieModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    function traerSeries(){    
        $sentencia = $this->db->prepare("SELECT * FROM series");
        $sentencia->execute();
        $series = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $series; 
    }
    
    function verSerie($id){    
        $sentencia = $this->db->prepare("SELECT a.*,b.* FROM series a INNER JOIN canales b ON a.fk_id_Nombre = b.id_canal WHERE a.id_Series = ?");
        $sentencia->execute(array($id));
        $serie = $sentencia->fetch(PDO::FETCH_OBJ);
        return $serie;
    }

    function agregarSerie($nombreSerie,$fk_id_Nombre,$Canal,$Genero){      
        $sentencia = $this->db->prepare("INSERT INTO series (nombreSerie, fk_id_Nombre, Canal, Genero) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombreSerie,$fk_id_Nombre,$Canal,$Genero));              
    }
    
    function borrarSerieFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM series WHERE series . id_Series = ?");
        $sentencia->execute(array($id));
    }

    function editarSerieFromDB($id, $nombreSerie, $fk_id_Nombre, $Canal, $Genero){
        $sentencia = $this->db->prepare("UPDATE series SET nombreSerie = ?, fk_id_Nombre = ?, Canal = ?, Genero = ? WHERE id_Series = ?");
        $sentencia->execute(array($nombreSerie, $fk_id_Nombre, $Canal, $Genero, $id));
    }

    function obtenerSeriesporCanal($canal){
        $sentencia = $this->db->prepare("SELECT a.*,b.* FROM series a INNER JOIN canales b ON a.fk_id_Nombre = b.id_canal WHERE b.id_canal = ?");
        $sentencia->execute(array($canal));
        $serieCanal = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $serieCanal;
    }
}


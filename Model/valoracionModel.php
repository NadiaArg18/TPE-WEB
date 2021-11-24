<?php

class valoracionModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_entretenimiento;charset=utf8', 'root', '');
    }

    function showComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM valoracion");
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function cargarComentario($comentario, $puntaje, $fk_id_Nombre){
        $sentencia = $this->db->prepare("INSERT INTO valoracion(comentario,puntaje,fk_id_Nombre) VALUES(?,?,?)");
        $sentencia->execute(array($comentario, $puntaje, $fk_id_Nombre));
    }

    function comentariosporSerie($id_Series){
        $sentencia = $this->db->prepare("SELECT * FROM valoracion WHERE fk_id_Nombre = ?");
        $sentencia->execute(array($id_Series));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function obtenerValoracion($id){
        $sentencia = $this->db->prepare("SELECT * FROM valoracion WHERE id_valoracion = ?");
        $sentencia->execute(array($id));
        $valoracion = $sentencia->fetch(PDO::FETCH_OBJ);
        return $valoracion;
    }

    function eliminarComentario($id){
        $query = $this->db->prepare("DELETE FROM valoracion WHERE id_valoracion = ?");
        $query->execute(array($id));
    }
}

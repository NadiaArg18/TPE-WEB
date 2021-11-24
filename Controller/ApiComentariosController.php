<?php
require_once "./Model/valoracionModel.php";
require_once "./View/ApiView.php";
require_once "./Autenticacion/Autenticar.php";

class ApiComentariosController{
    
    private $model;
    private $view;
    private $autenticar;

    function __construct(){
        $this->model = new valoracionModel();
        $this->view = new ApiView();
        $this->autenticar = new Autenticar();
    }

    function obtenerComentarios(){
        $comentarios = $this->model->showComentarios();
        return $this->view->response($comentarios, 200);
    }

    function eliminarComentario($params = null){
        $id_comentario = $params[":ID"];
        $comentario = $this->model->showComentarios($id_comentario);

        if ($comentario){
            $this->model->eliminarComentario($id_comentario);
            return $this->view->response("El comentario fue eliminado", 200);
        } else{
            return $this->view->response("El comentario no existe", 404);
        }
    }

    function agregarComentario(){
        //Obtengo el body del request (json)
        $body = $this->getBody();
        //Le mando los parametros con el objeto body
        $this->model->cargarComentario($body->comentario, $body->puntaje, $body->fk_id_Nombre);
    }

    function comentariosporSerie($params = null){
        $id_Series = $params[':ID'];
        $comentarios = $this->model->comentariosporSerie($id_Series);
        if ($comentarios){
            return $this->view->response($comentarios, 200);
        } else{
            return $this->view->response($comentarios, 404);
        }
    }

    /**
     * Devuelve el body del request
     */
    private function getBody(){
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
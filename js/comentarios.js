"use strict"
let form = document.querySelector("#form-alta").addEventListener("submit", agregarComentario);
const API_URL = "api/comentarios";


let app = new Vue({
    el: "#app",
    data: {
        titulo: "Lista de Comentarios",   
        comentarios: [], // this->smarty->assign("tareas",  $tareas)
    },
    methods: {
        btneliminar: function(){
            let id_valoracion = Event.target.getAttribute('data-id_valoracion');
            eliminarComentario(id_valoracion);
        }
    }
});

async function obtenerComentarios(){
    // fetch para traer todos los comentarios
    try{
        let response = await fetch(API_URL);
        let comentarios = await response.json();

        app.comentarios = comentarios;
    } catch (e){
        console.log(e);
    }
}

async function agregarComentario(){
    let formData = new FormData(form);
    let comentario = formData.get('comentario');
    let puntaje = formData.get('puntaje');
    let fk_id_Nombre = formData.get('fk_id_Nombre');
    let valoracion = {
        "comentario": comentario,
        "puntaje": puntaje,
        "fk_id_Nombre": fk_id_Nombre,
    }
    try{
        let res = await fetch (API_URL,{
            "method": "POST",
            "headers": {"Content-type": "application/json"},
            "body": JSON.stringify(valoracion)
        });
        if(res.status === 200){
            console.log(valoracion);       
        } else {
            console.log("Error al crear comentario");
        }
    } catch(e){
        console.log(e);
    }
}

async function eliminarComentario(id_valoracion){
    try{
        let res = await fetch(`${API_URL}/${id_valoracion}`,{
        method : "DELETE"
        });
        if(res.status === 200){
            console.log("se eliminó");
            comentariosporSerie();
        } else{
            console.log("error al borrar")
        }
    } catch(e){
        console.log(e);
    }
}

comentariosporSerie();

async function comentariosporSerie(){
    let formData = new FormData(form);
    let id_Series = new Number(formData.get('fk_id_Nombre'));
    try{
        let response = await fetch(`${API_URL}/${id_Series}`);
        let comentarios = await response.json();
        app.comentarios = comentarios;
    } catch(e){
        console.log(e);
    }
}
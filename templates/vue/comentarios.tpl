{literal}
    <h1>{{titulo}}</h1>
        <ul id="listaComentarios">
            <li v-for="comentario in comentarios">
               Comentario: {{comentario.comentario}} 
               Puntaje: {{comentario.puntaje}}
               <button v-on:click="btneliminar" :data-id_valoracion="comentario.id_valoracion">Eliminar</button>
            </li>       
        </ul>
{/literal}

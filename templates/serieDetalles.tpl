{include file='templates/header.tpl'}

<h1>Serie: {$serie->nombreSerie}</h1>
<h2>Canal de Televisión: {$serie->Canal}</h2>
<h2>Género: {$serie->Genero}</h2>

{if $logeado}
<h3>Agregar comentario: </h3>
<form action="" id="form-alta">
        <label for="comentario">Comentario: </label>
        <textarea name="comentario" id="comentario"></textarea>
        <label for="puntaje">Puntaje: </label>
        <input type="number" name="puntaje" id="puntaje" class="btn btn-success" min="0" max="5" required>
        <input type="number" value="{$serie->id_Series}" name="fk_id_Nombre" class="hidden">
        <input type="submit" class="btn btn-primary" id="btn-carga">
</form>

<div id="app">
        {include file='templates/vue/comentarios.tpl'}
</div>
{else}
        <form action="" id="form-alta">
                <input type="number" value="{$serie->id_Series}" name="fk_id_Nombre" class="hidden">
        </form>
        <div id="app">
                {include file='templates/vue/comentarios.tpl'}
        </div>

<a href='home'> Volver </a>

<script src="js/comentarios.js"></script>
{include file='templates/footer.tpl'}
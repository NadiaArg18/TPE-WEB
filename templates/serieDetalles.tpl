{include file='templates/header.tpl'}

<h1>Serie: {$serie->Nombre}</h1>
<h2>Canal de Televisión: {$serie->Canal}</h2>
<h2>Género: {$serie->Genero}</h2>

<form action="editarSerie" method="post">
        <input type="text" placeholder="Nombre" name="Nombre" id="Nombre">
        <input type="text" placeholder="Canal" name="Canal" id="Canal">
        <input type="text" placeholder="Genero" name="Genero" id="Genero">
</form>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}
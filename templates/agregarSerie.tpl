{include file='templates/header.tpl'}

<a class="btn-logout" href="logout">Logout </a>
<h1>Agrega tu propia serie en la tabla</h1>

<form action="crearSerie" method="post">
        <input type="text" placeholder="Nombre" name="nombreSerie" id="nombreSerie">
        <input type="text" placeholder="id" name="fk_id_Nombre" id="fk_id_Nombre">
        <input type="text" placeholder="Canal" name="Canal" id="Canal">
        <input type="text" placeholder="Genero" name="Genero" id="Genero">
        <input type="submit" value="Agregar">
</form>

{include file='templates/footer.tpl'}
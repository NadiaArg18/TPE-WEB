{include file='templates/header.tpl'}

<a class="btn-logout" href="logout">Logout </a>
<h1>Agrega tu Canal</h1>

<form action="crearCanal" method="post">
        <input type="text" placeholder="Canal" name="NombreCanal" id="NombreCanal">
        <input type="text" placeholder="id" name="id_canal" id="id_canal">
        <input type="submit" value="Agregar">
</form>

{include file='templates/footer.tpl'}
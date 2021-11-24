{include file='templates/header.tpl'}

<div class="container">
    <h2>Registrarse</h2>
            <form class="form-alta" action="registrarUser" method="post">
                <input placeholder="Email" type="text" name="Email" id="Email" required>
                <input placeholder="Contraseña" type="password" name="Contraseña" id="Contraseña" required>
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </form>

    <div class="row mt-4">
        <div class="col-md-4">
            <h3>Iniciar Sesión</h3>
            <form class="form-alta" action="verify" method="post">
                <input placeholder="Email" type="text" name="Email" id="Email" required>
                <input placeholder="Contraseña" type="password" name="Contraseña" id="Contraseña" required>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='templates/footer.tpl'}

{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Iniciar Sesión</h2>
            <form class="form-alta" action="verifyLogin" method="post">
                <input placeholder="Email" type="text" name="Email" id="Email" required>
                <input placeholder="Contraseña" type="password" name="Contraseña" id="Contraseña" required>
                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
            </form>
        </div>
    </div>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='templates/footer.tpl'}

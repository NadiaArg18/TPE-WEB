{include file="templates/header.tpl"}

    <div class="content-admin">
        <div class="login-form">
            <form action="admin/permisos/editar" method="post">
                <h2 class="text-center">Administrar permisos</h2>       
                <div class="form-group">
                    <h3>E-mail</h3>
                    <select class="form-select form-select-sm" name="emailUsuario">
                        {foreach from=$usuarios item=$usuario}
                            <option value="{$usuario->email}">{$usuario->email}</option>
                        {/foreach}
                    </select>
                    <h3>Rol</h3>
                    <select class="form-select form-select-sm" name="rolUsuario">
                        <option value="admin">Administrador</option>
                        <option value="usuario">Usuario</option>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-block">Editar</button>
                </div>
            </form>
        </div> 
        

        <div class="table-box">
            <table class="content-table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Permisos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$usuarios item=$usuario}
                    <tr>
                        <td>{$usuario->email}</td>
                        <td>{$usuario->rol}</td>
                        <td><a href="admin/permisos/borrar/{$usuario->id}" class="btn btn-black">Eliminar usuario</a></td>
                    </tr>
                {/foreach}
            </tbody> 
        </table>
        </div>
    </div>
    
{include file="templates/footer.tpl"}
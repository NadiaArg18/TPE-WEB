{include file='templates/header.tpl'}

<div>
    <table>
        <thead class="encabezado">
            <tr>
                <th>Nombre</th>
                <th>Canal</th>
                <th>Genero</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$series item=$listSeries}
            <tr>
                <td><a href="verSerie/{$listSeries->id_Series}"> {$listSeries->nombreSerie}</a></td>
                <td><a href="verSerie/{$listSeries->id_Series}"> {$listSeries->Canal}</a></td>
                <td><a href="verSerie/{$listSeries->id_Series}"> {$listSeries->Genero}</a></td>
                <td><a href="borrarSerie/{$listSeries->id_Series}">Eliminar</a></td>                    
            
            <form action="editarSerie/{$listSeries->id_Series}" method="POST">
                <input type="number"  name="id_Series" id="id_Series"  value="{$listSeries->id_Series}" class="hidden">
                <input type="text" placeholder="Serie" name="nombreSerie" id="nombreSerie"  required> 
                <select type="text" name="fk_id_Nombre" id="fk_id_Nombre">
                {foreach from=$canales item=$canal}
                    <option value="{$canal->id_canal}">{$canal->NombreCanal}</option>
                {/foreach}
                </select>
                <input type="text" placeholder="Genero" name="Genero" id="Genero" required> 
                <input type="submit" value="Modificar">
            </form> 
            </tr>  
        {/foreach}
        </tbody>
    </table>

    <ul id="listacanales">
        {foreach from=$canales item=$listCanales}
            <a href="verSerieCanal/{$listCanales->id_canal}">{$listCanales->NombreCanal}
                <li>
                    <a href="borrarCanal/{$listCanales->id_canal}">Eliminar</a>
                </li>
            </a>
        
        <form action="editarCanal" method="post">
                <input type="text" placeholder="Canal" name="NombreCanal">
                <input type="text" placeholder="id" name="id_canal" class="hidden">
                <input type="submit" value="Modificar">
            </form>
        {/foreach}
    </ul>

        {if $smarty.session.Administrador == 'userAdmin'}
            <h1>Lista de usuarios</h1>
                <ul>
                    {foreach from=$usuarios item=$users}
                         <li>
                         {* Con el if miro en que cuenta estoy iniciado y deshabilito los botones de borrar,agregar y quitar admin *}
                         {if $smarty.session.Email == {$users->email}}
                             {$users->email}
                             {* Si ya es admin agrego boton de quitar admin *}
                             {else if $users->Administrador == 'userAdmin'}
                                 {$users->email}
                            <button class="btn btn-danger">
                                <a href="deleteUser/{$users->id_Usuarios}">Borrar</a>
                            </button>
                            
                            <form action="removeAdmin" method="post" class="inputCanales">
                                <input type="text" value="{$users->id_Usuarios}" name="id_Usuarios" id="id_Usuarios" class="hidden">
                                <input type="text" value="no-admin" name="Administrador" id="Administrador" class="hidden">
                                <input type="submit" value="Quitar Admin" class="btn btn-success">
                            </form>
                            {else}
                            {* Sino es admin agrego el boton para agregarlo *}
                            {$users->email}
                            <button class="btn btn-danger">
                                <a href="deleteUser/{$users->id_Usuarios}">Borrar</a>
                            </button>
                                <form  action="addAdmin" method="post" class="inputCanales">
                                <input type="text" value="{$users->id_Usuarios}" name="id_Usuarios" id="id_Usuarios" class="hidden">
                                <input type="text" value="userAdmin" name="Administrador" id="Administrador" class="hidden">
                                <input type="submit" value="Dar Admin" class="btn btn-success">
                            </form>
                         {/if}                      
                        </li>
                    {/foreach}
                </ul>
            {/if}
</div>

{include file='templates/footer.tpl'}
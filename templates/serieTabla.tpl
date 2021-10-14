{include file='templates/header.tpl'}

<table>
        <thead class="encabezado">
            <tr>
                <th>Nombre</th>
                <th>Canal</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$series item=$item}             
                <tr>
                    <td><a href="verSerie/{$item->id_Series}"> {$item->Nombre}</a></td>
                    <td><a href="verSerie/{$item->id_Series}"> {$item->Canal}</a></td>
                    <td><a href="verSerie/{$item->id_Series}"> {$item->Genero}
                    <input type="submit" value="Editar"></a>
                    <a href="borrarSerie/{$item->id_Series}">Borrar</a></td>                    
                </tr>              
            {/foreach}
        </tbody>
</table>

{include file='templates/footer.tpl'}
{include file='templates/header.tpl'}

<h2>Lista completa de series del canal: </h2>
    <ul class="serieporCanal">         
        {foreach from=$serieporCanal item=$serieCanal}
            <li>
                <a href="verSerieCanal/{$serieCanal->id_canal}">{$serieCanal->nombreSerie}</a> 
            </li>
        {/foreach}
    </ul>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}
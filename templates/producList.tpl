{include file="header.tpl"}

{include file="form_alta.tpl"}

<!-- tabla de productos -->
<table class="table">
    <thead class="table-dark">
            <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Categoria</td>
                {if isset ($smarty.session.USER_EMAIL)}
                <td>Borrar</td>
                <td>Editar</td>
                {/if}
            </tr>
    </thead>

    <tbody>
        
        {foreach from=$productos item=$producto}
            <tr>
                <td>{$producto->titulo}</td>
                <td>{$producto->descripcion|truncate:25}</td>
                <td>{$producto->precio}</td>
                <td>{$producto->nombre}</td>
                {if isset ($smarty.session.USER_EMAIL)} 
                <td><a href='delete/{$producto->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                <td><a href='goEditProduct/{$producto->id}' type='button' class='btn btn-success'>Editar</a></td>
                {/if}
                <td><a href='mostrarProducto/{$producto->id}' type='button' class='btn btn-primary mt-2'>Ver producto</a></td>
            </tr>
        {/foreach}
      
    </tbody>
</table>

<p class="mt-3"><small>Mostrando {$count} productos</small></p>

{include file="footer.tpl"}
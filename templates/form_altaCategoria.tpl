<!-- formulario de alta de categoria -->
{include file="header.tpl"}

<form action="addCategoria" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Nombre nueva Categoria</label>
                    <input name="title" type="text" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>

<!-- lista de categorias -->
<table class="table">
    <thead class="table-dark">
            <tr>
                <td>Nombre</td>
                {if isset ($smarty.session.USER_EMAIL)} 
                <td>Borrar</td>
                <td>Editar</td>
                {/if } 
            </tr>
    </thead>

    <tbody>
        
        {foreach from=$categorias item=$categoria}
            <tr>
                <td>{$categoria->nombre}</td>
                {if isset ($smarty.session.USER_EMAIL)} 
                <td><a href='deleteCategoria/{$categoria->id_categorias}' type='button' class='btn btn-danger'>Borrar</a></td>
                <td><a href='goEditCategoria/{$categoria->id_categorias}' type='button' class='btn btn-success'>Editar</a></td>
                {/if}
            </tr>
        {/foreach}
      
    </tbody>
</table>

<p class="mt-3"><small>Mostrando {$count} categorias</small></p>

{include file="footer.tpl"}

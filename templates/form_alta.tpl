<!-- formulario de alta de tarea -->
{if isset ($smarty.session.USER_EMAIL)} 
    <form action="add" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Título</label>
                    <input name="title" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <textarea name="precio" class="form-control" rows="3"></textarea>
        </div>

            <div class="col-3">
                <div class="form-group">
                 
                    
                   <select name="categoria" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option selected> Seleccione Categoria </option>
                      {foreach from = $categorias item = $categoria} 
                        <option value="{$categoria->id_categorias}">{$categoria->nombre}</option>
                      {/foreach}
                   </select>  
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
{/if}
{include file="header.tpl"}

<h2>{$titulo}</h2>
<form action="editProduct" method="POST" class="my-4">
    <input type="hidden" value="{$id}" name="id" id="id" required>
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Título</label>
                    <input name="titleE" type="text" class="form-control" value="{$producto->titulo}">
                </div>
            </div>

            <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descriptionE" class="form-control" rows="3"  >{$producto->descripcion}</textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <textarea name="precioE" class="form-control" rows="3">{$producto->precio}</textarea>
        </div>

            <div class="col-3">
                <div class="form-group">
                    <label>Categorias</label>
                    <select name="id_categoriasE" class="form-control">
                        

                        <option selected>Seleccione categoria</option>
                        {foreach from = $categorias item = $categoria} 
                            <option value="{$categoria->id_categorias}">{$categoria->nombre}</option>
                        {/foreach}
        
                    </select>
                </div>
            </div>
        </div>

    <input type="submit" class="btn btn-primary mt-2" value="Editar">

</form>
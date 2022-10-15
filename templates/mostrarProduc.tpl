{include file="header.tpl"}

<div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Título</label>
                <input name="title" type="text" class="form-control" value="{$producto->titulo}">
            </div>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3">{$producto->descripcion}</textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <textarea name="precio" class="form-control" rows="3">{$producto->precio}</textarea>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <textarea name="categorias" class="form-control" rows="3">{$categoria->nombre}</textarea>
        </div>
</div>
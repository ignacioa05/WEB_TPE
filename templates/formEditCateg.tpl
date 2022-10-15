{include file="header.tpl"}

<h2>{$titulo}</h2>
<form action="editCategoria" method="POST" class="my-4">
    <input type="hidden" value="{$id}" name="id" id="id" required>
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titleCE" type="text" class="form-control" value="{$categoria->nombre}">
                    </div>
                </div>
            </div>


    <input type="submit" class="btn btn-primary mt-2" value="Editar">

</form>
{include file="./header.tpl"}
<form action="/vendors/editing.php" method="post">
    <input type="hidden" name="vendor_id" value="{$vendor->getId()}">
    <div class="form-group">
        <label for="category_name">Название производителя</label>
        <input id="category_name" type="text" name="name" class="form-control" required value="{$vendor->getName()}">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
</form>
{include file="./bottom.tpl"}
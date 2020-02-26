{include file="./header.tpl"}
<div class="row">
    <div class="col-6 mb-4"><a href="/vendors/edit.php" class="btn btn-success">Добавить Производителя</a></div>
    <div class="col-md-12" style="font-size: 25px;font-width: 700;margin-bottom: 30px;">
        Производители
    </div>
    {foreach from=$vendors item=e}
    <div class="col-md-12 category-card">
        <p class="card-text category-name">{$e.name}</p>
            <a href="/vendors/edit.php?vendor_id={$e.id}"class="btn btn-primary">Редактировать</a>
        <form action="/vendors/delete.php" method="POST">
            <input type="hidden" value="{$e.id}" name="delete_id">
            <button type="submit"  class="btn btn-sm btn-outline-secondary">Удалить</button>
        </form>
    </div>
    {/foreach}
</div>
{include file="./bottom.tpl"}
{include file="./header.tpl"}
<div class="row">
    <div class="col-6 mb-4"><a href="/categories/edit.php" class="btn btn-success">Добавить Категорию</a></div>
    <div class="col-md-12" style="font-size: 25px;font-width: 700;margin-bottom: 30px;">
        Категории
    </div>
    {foreach from=$categories item=category}
        <div class="col-md-12 category-card">
            <p class="card-text category-name">{$category->getName()}</p>
            <a href="/categories/edit.php?category_id={$category->getId()}"class="btn btn-primary">Редактировать</a>
            <form action="/categories/delete.php" method="POST">
                <input type="hidden" value="{$category->getId()}" name="delete_id">
                <button type="submit"  class="btn btn-sm btn-outline-secondary">Удалить</button>
            </form>
        </div>
    {/foreach}
</div>
{include file="./bottom.tpl"}
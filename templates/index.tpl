{include file="header.tpl"}
<div class="row">
    <div class="col-6 mb-4"><a href="/products/edit.php" class="btn btn-success">Добавить товар</a></div>
</div>
<div class="row">
    {foreach from=$products item=e}

        <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото товара</text></svg>
            <div class="card-body">
                <p class="card-text" style="font-weight:700; font-size: 20px;">{$e.name}</p>
                <div class="card-field">
                    <p class="card-text product-name">Цена:</p><small class="text-muted">{$e.price}</small>
                </div>
                <div class="card-field">
                    <p class="card-text product-name">Количество:</p><small class="text-muted">{$e.amount}</small>
                </div>
                <div class="card-field">
                    <p class="card-text product-name">Категории:</p>
                    {foreach from=$categories item=c}
                        {if $c.product_id == $e.id}
                            <p class="card-text product-name">{$c.name}</p>
                        {/if}
                    {/foreach}
                </div>
                <div class="card-field">
                    <p class="card-text product-name">Производитель:</p>
                    {foreach from=$vendors item=z}
                        {if $z.id == $e.vendor_id}
                            <p class="card-text product-name">{$z.name}</p>
                        {/if}
                    {/foreach}
                    <p class="card-text product-name"></p>
                </div>
                <div class="card-field">
                    <p class="card-text product-name">Описание:</p><p class="card-text product-name">{$e.description}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/products/edit.php?product_id={$e.id}" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                        <form action="/products/editing.php" method="POST">
                            <input type="hidden" value="{$e.id}" name="product_id">
                             <button type="submit"  class="btn btn-sm btn-outline-secondary">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/foreach}
</div>
{include file="bottom.tpl"}
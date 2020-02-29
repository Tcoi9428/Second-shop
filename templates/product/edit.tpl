{include file = 'header.tpl'}
<form action="/products/editing.php" method="post">
    <input type="hidden" value="{$product->getId()}" name="product_id">
    <div class="form-group">
        <label for="product_name">Название товара</label>
        <input id="product_name" type="text" name="name" class="form-control" required value="{$product->getName()}">
    </div>
    <div class="form-group">
        <label for="product_price">Цена</label>
        <input id="product_price" type="text" name="price" class="form-control" required value="{$product->getPrice()}">
    </div>
    <div class="form-group">
        <label for="product_amount">Количество</label>
        <input id="product_amount" type="number" name="amount" class="form-control" required value="{$product->getAmount()}">
    </div>

    <div class="form-group">
        <label for="product_vendor">Производитель</label>
        <select class="form-control" name="vendor_id" id="product_vendor">
            <option value="0">-</option>
            {foreach from=$vendors item=e}
                <option value="{$e.id}" {if $e.id == $product->getVendorId()}selected{/if}>{$e.name}</option>
            {/foreach}
        </select>
    </div>
    <div class="form-group">
        <label for="product_folders">Категории</label>
        <select multiple class="form-control" name="categories_ids[]" id="product_category">
                {foreach from=$categories item=e}
                    <option value="{$e.id}" {foreach from=$product item=c} {if $product_id == $c.id && $e.id == $c.category_id} selected {/if}{/foreach}>{$e.name}</option>
                {/foreach}
        </select>
    </div>

    <div class="form-group">
        <label for="product_description">Описание товара</label>
        <textarea id="product_description" name="description" class="form-control" rows="3">{$product->getDescription()}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
</form>
{include file = 'bottom.tpl'}
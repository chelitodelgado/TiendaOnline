<?php if (isset($product)) : ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image"></div>
        <?php if ($product->imagen != null) : ?>
            <img src="<?= base_url ?>upload/images/<?= $product->imagen ?>" class="image"/>
        <?php else: ?>
            <img src="<?= base_url ?>upload/default.png" class="image"/>
        <?php endif; ?>
        <div class="data">
            <strong>Descripción</strong>
            <p class="description"><?= $product->descripcion ?></p>
            <p class="price">$ <?= $product->precio ?></p>
            <a href="<?=base_url?>carrito/add&id=<?=$product->id_producto?>" class="button" style="float: left;">Comprar</a>
        </div>
    </div>

<?php else: ?>
    <h1 class="alerta-error">El proucto no existe</h1>
<?php endif; ?>

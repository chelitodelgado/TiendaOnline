<!-- CONTENIDO CENTRAL -->

<h1>Some of the Products</h1>

<?php while ($product = $productos->fetch_object()): ?>

    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$product->id_producto?>">
            <?php if ($product->imagen != null) : ?>
                <img src="<?= base_url ?>upload/images/<?= $product->imagen ?>" class="thumb"/>
            <?php else: ?>
                <img src="<?= base_url ?>upload/default.png" class="thumb"/>
            <?php endif; ?>
            <h2><?= $product->nombre ?></h2>
        </a>
        <p><?= $product->precio ?></p>
        <a href="<?=base_url?>carrito/add&id=<?=$product->id_producto?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>

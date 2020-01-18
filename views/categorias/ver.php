<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
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
                <a href="<?=base_url?>carrito/add&id=<?=$product->id_producto?>" class="button">Buy</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1 class="alerta-error">La categoria no existe</h1>
<?php endif; ?>

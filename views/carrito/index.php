<h1>Carrito de la compra</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>

    <table class="table">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php
        foreach ($_SESSION['carrito'] as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>upload/images/<?= $producto->imagen ?>" class="img_carrito"/>
                    <?php else: ?>
                        <img src="<?= base_url ?>upload/default.png" class="img_carrito"/>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id_producto ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    $ <?= $producto->precio ?>
                </td>
                <td>
                    <?= $elemento['unidades'] ?>
                    <div class=" updown-unidades">
                        <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="button"> + </a>
                        <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="button"> - </a>
                    </div>
                </td>
                <td>
                    <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="button button-carrito button-red">Eliminar producto</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Eliminar carrito</a>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3 style="float: right">Precio Total: $ <?= $stats['total'] ?></h3>
        <br><br>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    </div>
<?php else: ?>
    <p>No hay productos en el carrito</p>
<?php endif; ?>


<h1>Gestion de Productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small" style="float:left;">
    Agregar Productos </a>
<br><br>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "complete"): ?>
    <strong class="alert_green">El producto de agrego correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != "complete"): ?>
    <strong class="alert_red">El producto no se agrego correctamente</strong>
<?php endif;?>
<?php Utils::delateSession('producto');?>
    
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
    <strong class="alert_green">El producto se elimino correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != "complete"): ?>
    <strong class="alert_red">El producto no se elimino correctamente</strong>
<?php endif;?>
<?php Utils::delateSession('delete');?>
    <br>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acción</th>
    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id_producto; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td>$ <?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td>
                <a href="<?= base_url?>producto/eliminar&id=<?=$pro->id_producto?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?= base_url?>producto/editar&id=<?=$pro->id_producto?>" class="button button-gestion">Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>
    
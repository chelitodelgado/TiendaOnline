<?php if (isset($editar) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar Producto: <?= $pro->nombre ?> </h1>
    <?php $url_action = base_url . "producto/save&id=" . $pro->id_producto; ?>
<?php else: ?>
    <h1>Agregar productos nuevos</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>
    <br><br>
<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" required/>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"  required><?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : '' ?>" required/>

    <label for="stock">stock</label>
    <input type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : '' ?>" required/>

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id_categoria ?>" <?= isset($pro) && is_object($pro) && $cat->id_categoria == $pro->id_categoria ? 'selected ' : ''; ?> >
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
        <center><img src="<?= base_url ?>upload/images/<?= $pro->imagen ?>" class="thumb"/></center>
        <?php endif; ?>
    <input type="file" name="imagen"  />

    <input type="submit" value="Agregar" />
</form>

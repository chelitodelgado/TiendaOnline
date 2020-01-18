<h1>Gestionar categorias</h1>
<a href="<?= base_url ?>categoria/crear" class="button button-small" style="float:left;">
    Crear categoria </a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id_categoria; ?></td>
            <td><?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>

</table>
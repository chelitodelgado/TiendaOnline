<!-- BARRA LATERAL -->
<aside id="lateral">

    <div id="carrito" class="block_aside">
        <h3>Carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito(); ?>
            <li><a style="text-decoration: none" href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
            <li><a style="text-decoration: none" href="<?= base_url ?>carrito/index">Total (<?= $stats['total'] ?>)</a></li>
            <li><a style="text-decoration: none" href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
        </ul>
    </div>

    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Go to the web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email"/>
                <label for="password">Password</label>
                <input type="password" name="password"/>
                <input type="submit" value="Enviar" class="input_save"/>
            </form>

        <?php else: ?>
            <h3><?= $_SESSION['identity']->nombre; ?> <?= $_SESSION['identity']->apellidos; ?></h3>
        <?php endif; ?>
        <ul>
            <?php if (isset($_SESSION['admin'])): ?>
                <li><a style="text-decoration: none" href="<?= base_url ?>categoria/index">Category management</a></li>
                <li><a style="text-decoration: none" href="<?= base_url ?>producto/gestion">Products management</a></li>
                <li><a style="text-decoration: none" href="<?= base_url ?>pedido/gestion">Order management</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])): ?>
                <li><a style="text-decoration: none" href="<?= base_url ?>pedido/pedidos">My orders</a></li>
                <li><a style="color: red; text-decoration: none" href="<?= base_url ?>usuario/logout">Cerrar sessión</a></li>
            <?php else: ?>
                <li><a style="color: red; text-decoration: none" href="<?= base_url ?>usuario/registro">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<div id="central">

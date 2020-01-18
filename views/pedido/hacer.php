
<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Hacer pedido</h1>
    <p><a href="<?= base_url ?>carrito/index">Ver productos y precio de pedidos</a></p>
    <br>
    
        <div class="form_container">
        <h3>Datos de envio</h3>
        <form action="<?= base_url . "pedido/add" ?>" method="POST">

            <label for="proviencia">Pais</label>
            <input type="text" name="proviencia" required/>

            <label for="localidad">Estado</label>
            <input type="text" name="localidad" required/>

            <label for="direccion">Direccion completa</label>
            <input type="text" name="direccion" required/>

            <input type="submit" value="Confirmar pedido" />
        </form>
    </div>


<?php else : ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado para realizar un pedido.</p>
<?php endif; ?>



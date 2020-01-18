<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id_pedido?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?> >Pendiente</option>
                <option value="preparation"<?=$pedido->estado == "preparation" ? 'selected' : '';?> >En preparación</option>
                <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?> >Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?> >Enviado</option>
            </select>
            <input type="submit" value="Marcar" class="button button-small">
        </form>
    <?php endif; ?>
    <br>
    <table class="table">
        <tr>
            <th>Producto</th>
            <th>nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php
        while ($ped = $productos->fetch_object()):
            ?>
            <tr>
                <td>
                    <img src="<?= base_url ?>upload/images<?= $ped->images ?>">
                </td>
                <td>
                    <?= $ped->nombre ?>
                </td>
                <td>
                    $ <?= $ped->precio ?>
                </td>
                <td>
                    <?= $ped->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <p style="font-size: 20px;color: white;background: #000066">ESTADO: 
        <strong style="color: yellow"><?= Utils::showStatus($pedido->estado)?></strong></p> 

    <div class="cardWrap">
        <div class="card cardLeft">
            <h2 style="color: white;text-shadow: 0px 2px 1px #222222;">ControlGeek.com <strong>Store</strong></h2>
            <div class="title">
                <h4>Pais</h4>
                <span><?= $pedido->proviencia ?></span>
            </div>
            <div class="name">
                <h4>Localidad</h4>
                <span> <?= $pedido->localidad ?> </span>
            </div>

            <span> 
                <strong>Enviar a <?= $pedido->direccion ?></strong>

            </span>

        </div>
        <div class="card cardRight">
            <div class="eye"></div>
            <div class="number">
                <br><br>
                <h3><?= $pedido->id_pedido ?></h3>
                <span> N° pedido </span>
            </div>
            <div class="barcode"></div>
        </div>
    </div>
<?php endif; ?>


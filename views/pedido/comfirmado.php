<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido se ha realizado con exito!</p>

    <?php if (isset($pedido)) : ?>
        <div class="cardWrap">
            <div class="card cardLeft">
                <h2 style="color: white;text-shadow: 0px 2px 1px #222222;">ControlGeek.com <strong>Store</strong></h2>
                <div class="title">
                    <h4>Numero de tarjeta</h4>
                    <span>1234-5678-9987-4563</span>
                </div>
                <div class="name">
                    <h4>Total a pagar</h4>
                    <span>$ <?=$pedido->coste?></span>
                </div>
                
                <span> 
                    <?php while ($producto = $productos->fetch_object()) :?>
                    <strong>Unidades</strong> <?=$producto->unidades?>
                    <?php endwhile;?>
                </span>

            </div>
            <div class="card cardRight">
                <div class="eye"></div>
                <div class="number">
                    <br><br>
                    <h3><?=$pedido->id_pedido?></h3>
                    <span> N° pedido </span>
                </div>
                <div class="barcode"></div>
            </div>
        </div>
    <?php endif; ?>


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'failed'): ?>
    <h1>Tu pedido no se ha confirmado</h1>
<?php endif; ?>


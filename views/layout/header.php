<!DOCTYPE html>
<html lang="es">
    <head>
        <title>My Store</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/main.css" type="text/css"/>
    </head>
    <body>
        <div id="container">
            <!-- CABEZERA -->
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/index.png" alt="Camiseta Logo"/>
                    <a href="<?= base_url ?>">Store of T Shirts</a>
                </div>
            </header>
            <!-- MENU -->
            <?php $categorias = Utils::showCategorias();?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url ?>">Home</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()) :?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id_categoria?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile;?>
                </ul>
            </nav>
            <div id="content">
<?php

require_once 'models/pedidos.php';

class pedidoController {

    public function hacer() {

        require_once 'views/pedido/hacer.php';
    }

    public function add() {

        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity'];
            $id = $usuario_id->id_usuario;

            $proviencia = isset($_POST['proviencia']) ? $_POST['proviencia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($proviencia && $localidad && $direccion && $usuario_id) {
                // Guardar datos en db
                $pedido = new Pedidos();
                $pedido->setId_usuario($id);
                $pedido->setProviencia($proviencia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }
            header("Location:" . base_url . 'pedido/comfirmado');
        } else {
            // Redirigir 
            header("Location:" . base_url . 'pedido/hacer');
        }
    }

    public function comfirmado() {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity'];
            $id = $usuario_id->id_usuario;

            $pedido = new Pedidos();
            $pedido->setId_usuario($id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedidos();
            $productos = $pedido_productos->getProductByPedido($pedido->id_pedido);
        }
        require_once 'views/pedido/comfirmado.php';
    }

    public function pedidos() {
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity'];
        $id = $usuario_id->id_usuario;

        // Sacar los pedidos del usuario
        $pedido = new Pedidos();
        $pedido->setId_usuario($id);

        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle() {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Sacar el pedido
            $pedido = new Pedidos();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los productos
            $pedido_productos = new Pedidos();
            $productos = $pedido_productos->getProductByPedido($id);

            require_once 'views/pedido/detalle.php';
        } else {
            header("Location" . base_url . 'pedido/mis_pedidos');
        }
    }

    public function gestion() {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedidos();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado() {
        Utils::isAdmin();

        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            // Recojo los datos
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            
            // Update de pedido
            $pedido = new Pedidos();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            //var_dump($estado);die();
            header("Location:" . base_url.'pedido/detalle&id='.$id);
        } else {

            header("Location:" . base_url);
        }
    }

}

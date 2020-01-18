<?php

class Pedidos {

    private $id;
    private $id_usuario;
    private $proviencia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getProviencia() {
        return $this->proviencia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setProviencia($proviencia) {
        $this->proviencia = $proviencia;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id_pedido ASC;");
        return $productos;
    }

    public function getOne() {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id_pedido ={$this->getId()};");
        return $producto->fetch_object();
    }

    public function getOneByUser() {
        $sql = "SELECT p.id_pedido, p.coste FROM pedidos p "
                //. " INNER JOIN lineas_Pedido lp ON lp.id_pedido = p.id_pedido "
                . " WHERE p.id_usuario = {$this->getId_usuario()} ORDER BY id_pedido DESC LIMIT 1;";
        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();
    }

    public function getAllByUser() {
        $sql = "SELECT p.* FROM pedidos p "
                . " WHERE p.id_usuario = {$this->getId_usuario()} ORDER BY id_pedido DESC;";
        $pedido = $this->db->query($sql);

        return $pedido;
    }

    public function getProductByPedido($id) {
//        $sql = "SELECT * FROM productos WHERE id_producto IN "
//                . "(SELECT id_producto FROM lineas_Pedido WHERE id_pedido = {$id});";

        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                . "INNER JOIN lineas_Pedido lp ON pr.id_producto = lp.id_producto "
                . "WHERE lp.id_pedido= {$id};";

        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES(NULL,{$this->getId_usuario()}, '{$this->getProviencia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()},'confirm',CURDATE(), CURTIME() );";
        //var_dump($sql);die();
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function save_linea() {

        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_Pedido VALUES(NULL, {$pedido_id}, {$producto->id_producto}, {$elemento['unidades']});";

            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "UPDATE  pedidos set estado='{$this->getEstado()}' ";
        $sql .= "WHERE id_pedido={$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}

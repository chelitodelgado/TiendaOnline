<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categorias/index.php';
    }

    public function ver() {
        if ($_GET['id']) {
            $id = $_GET['id'];
            
            // Conseguir categoria
            $categorias = new Categoria();
            $categorias->setId($id);
            
            $categoria =$categorias->getOne();
            
            // Conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategoria();
            
        }

        require_once 'views/categorias/ver.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save() {
        Utils::isAdmin();
        if ($_POST && isset($_POST['nombre'])) {
            //Guardar la categoria en bd
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:" . base_url . "categoria/index");
    }

}

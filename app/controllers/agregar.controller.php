<?php
require_once './app/views/agregar.view.php';
require_once './app/models/user.model.php';
require_once './app/models/productos.model.php';
require_once './app/helpers/auth.helper.php';

class AgregarController {
    private $view;
    private $model;

    function __construct(){
        AuthHelper::verifyStrict();

        $this->model = new ProductosModel();
        $this->view = new AgregarView();
    }

    function showAgregar(){     
        $this->view->showAgregar();
    }

    function addProducto(){

    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $categoria=$_POST['categoria'];
    
    if (empty($producto) || empty($precio)|| empty($categoria)) {
        $this->view->showError("Debe completar todos los campos");
        return;
    }

    $id = $this->model->insertProducto($producto, $precio, $categoria);

    if ($id) {        
        $this->view->showAgregar($id);
    } else {
        echo "Error al insertar la tarea";
    }

    }
}
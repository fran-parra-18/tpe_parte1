<?php
require_once './app/views/editar.view.php';
require_once './app/models/productos.model.php';
require_once './app/helpers/auth.helper.php';

class EditarController {
    private $view;
    private $model;

    function __construct(){
        AuthHelper::verifyStrict();

        $this->model = new ProductosModel();
        $this->view = new EditarView();
    }

    function showEditar($id){     
        $this->view->showEditar($id);
    }

    function editProducto($id){

        $producto=$_POST['producto'];
        $precio=$_POST['precio'];
        $categoria=$_POST['categoria'];
        
        if (empty($producto) || empty($precio)|| empty($categoria)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
    
        $this->model->editProducto($producto, $precio, $categoria, $id);

        header('Location: ' . BASE_URL . '/productos');
    }
}

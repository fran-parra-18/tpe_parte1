<?php
require_once './app/models/productos.model.php';
require_once './app/views/productos.view.php';
require_once './app/helpers/auth.helper.php';

class ProductosController {
    private $model;
    private $view;

    public function __construct() {
        AuthHelper::verify();

        $this->model = new ProductosModel();
        $this->view = new ProductosView();
    }

    public function showProductos() {

        

        // obtengo tareas del controlador
        $productos = $this->model->getProductos();
        
        // muestro las tareas desde la vista 
        $this->view->showProductos($productos);
        
        
    }
    public function deleteProducto($id){        
        $this->model->deleteProducto($id);
        header('Location: ' . BASE_URL . '/productos');
    }

    

    public function showHome(){
        $this->view->showHome();
    }
}
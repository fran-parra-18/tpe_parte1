<?php
require_once './app/models/productos.model.php';
require_once './app/views/productos.view.php';
require_once './app/helpers/auth.helper.php';
require_once './app/models/categorias.model.php';
        



class ProductosController {
    private $view;
    private $model;
    private $categoriasModel;
    
    public function __construct() {
        AuthHelper::verify();
        
        $this->model = new ProductosModel();
        $this->view = new ProductosView();
        $this->categoriasModel = new CategoriasModel();
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
 
    function mostrarProductosXCategoria($categoriaID){
        $categoria = $this->categoriasModel->getCategoriaById($categoriaID);
        
        if ($categoria) {
        
            $productos = $this->model->getProductosByCategoria($categoriaID);

            
            $this->view->mostrarProductosXCategoria($categoria, $productos);
            
        } else {
            
            $this->view->showError("error");
    
        }
    }
    
    public function showHome(){
        $this->view->showHome();
    }

    public function showError(){
        $this->view->showError("404 Page Not Found");
    }
    
    function showProductoEspecifico($id){
        
        $producto = $this->model->getProductoEspecifico($id);
        

        // muestro las tareas desde la vista 
        $this->view->mostrarProductoEspecifico($producto);
    }
}
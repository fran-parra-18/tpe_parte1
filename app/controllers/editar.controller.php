<?php
require_once './app/views/editar.view.php';
require_once './app/models/productos.model.php';
require_once './app/models/categorias.model.php';
require_once './app/helpers/auth.helper.php';


class EditarController {
    private $view;
    private $model;
    private $categoriasmodel;
 
    function __construct(){
        AuthHelper::verifyStrict();

        $this->categoriasmodel = new CategoriasModel();
        $this->model = new ProductosModel();
        $this->view = new EditarView();
        
    }

    function showEditar($id){    
        $categorias = $this->categoriasmodel->getAllCategorias(); // Obtener las categorías desde la base de datos
        $this->view->showEditar($id, $categorias); 
        
    }
    function showEditarCategoria($categoriaID){    
        $this->view->showEditarCategoria($categoriaID); 
        
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

        header('Location: ' . BASE_URL . 'productos');
    }
    function editCategoria($categoriaID){

        $nombre=$_POST['nombre'];
        
        if (empty($nombre)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
    
        $this->categoriasmodel->editCategoria($nombre, $categoriaID);

        header('Location: ' . BASE_URL . 'categorias');
    }
}

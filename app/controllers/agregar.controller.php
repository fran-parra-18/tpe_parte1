<?php
require_once './app/views/agregar.view.php';
require_once './app/models/categorias.model.php';
require_once './app/models/user.model.php';
require_once './app/models/productos.model.php';
require_once './app/helpers/auth.helper.php';
 

class AgregarController {
    private $view;
    private $productosModel;
    private $categoriasModel;


    function __construct(){
        AuthHelper::verifyStrict();

        $this->productosModel = new ProductosModel();
        $this->view = new AgregarView();
        $this->categoriasModel = new CategoriasModel();
    }

    function showAgregarProductos(){  
        $categorias = $this->categoriasModel->getAllCategorias();   
        $this->view->showAgregarProductos($id=null,$categorias);
    }

    function addProducto(){
        $categorias = $this->categoriasModel->getAllCategorias();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $producto = filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING);
                $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
                $categoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
        
                if (empty($producto) || $precio === false || $categoria === false) {
                    $this->view->showError("Debe completar todos los campos");
                    return;
                }

            $id = $this->productosModel->insertProducto($producto, $precio, $categoria);

            if ($id) {        
                $this->view->showAgregarProductos($id,$categorias);
            } else {
                $this->view->showError("Error al insertar el producto");
            }
        }else {
            
            $this->view->showAgregarProductos($id=null,$categorias);
        }
    }

    public function showAgregarCategoria() {
        $this->view->showAgregarCategoria();
    }

    public function addCategoria() {
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener el nombre de la categoría del formulario
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);

        // Verificar si el nombre no está vacío
        if (empty($nombre)) {
            $this->view->showError("Debe completar el campo 'Nombre'");
            return;
        }

        

        $categoriasModel = new CategoriasModel();
        $categoriaID = $categoriasModel->insertCategoria($nombre);

        if ($categoriaID) {
            // La categoría se ha insertado correctamente
            header('Location: ' . BASE_URL . 'categorias');;
            exit;
        } else {
            // Error al insertar la categoría
            echo "Error al insertar la categoría";
        }
    } else {
        $this->view->showAgregarCategoria();
    }
    }
}
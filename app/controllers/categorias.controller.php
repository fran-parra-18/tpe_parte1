<?php

require_once './app/models/categorias.model.php';
require_once './app/views/categorias.view.php';


class CategoriasController {
    private $model;
    private $view;
    public function __construct() {
        AuthHelper::verify();

        $this->model = new CategoriasModel();
        $this->view = new Categoriasview();
    }

    function mostrarCategorias() {
        // obtengo tareas del controlador
        $categorias = $this->model->getAllCategorias();
        // muestro las tareas desde la vista 
        $this->view->mostrarCategorias($categorias);
    }

    public function deleteCategoria($categoriaID){        
        $this->model->deleteCategoria($categoriaID);
        header('Location: ' . BASE_URL . '/categorias');
    }
}
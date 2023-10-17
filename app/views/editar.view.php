<?php

class EditarView {
    public function showEditar($id, $categorias) {  
        require 'templates/editar.phtml';
    }  
    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function showEditarCategoria($categoriaID) {  
        require 'templates/editarCategorias.phtml';
    }  
} 
<?php

class CategoriasView {
    public function mostrarCategorias($categorias) {
        require './templates/categorias.phtml';
    }

    public function mostrarProductoXCategortia($productos) {
        require './templates/productoXCategoria.phtml';
    }
    function showError($error) {
        require 'templates/error.phtml';
    }
} 
<?php

class CategoriasView {
    public function mostrarCategorias($categorias) {
        require './templates/categorias.phtml';
    }

    public function mostrarProductoXCategortia($productos) {
        require './templates/productosXCategorias.phtml';
    }

}
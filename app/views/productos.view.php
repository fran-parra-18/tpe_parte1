<?php

class ProductosView {
    public function showProductos($productos) {
        $count = count($productos);
        
        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        
        require 'templates/productos.phtml';
    }
        
    public function mostrarProductoEspecifico($producto) {
        
        require './templates/productoEspecifico.phtml';
    }
    public function mostrarProductosXCategoria($categoria, $productos) {
        require './templates/productoXCategoria.phtml';
    }
    public function showHome(){
        require 'templates/home.phtml';
    }
    function showError($error) {
        require 'templates/error.phtml';
    }
} 
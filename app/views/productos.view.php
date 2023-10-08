<?php

class ProductosView {
    public function showProductos($productos) {
        $count = count($productos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        
        require 'templates/productos.phtml';
    }

    public function showHome(){
        require 'templates/home.phtml';
    }
    
} 
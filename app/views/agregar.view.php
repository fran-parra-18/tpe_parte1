
<?php

class AgregarView {
    public function showAgregarProductos($id =  null,$categorias){
        require_once './templates/agregarProducto.phtml';
    }

    public function showAgregarCategoria($categoriaID =  null) {
        require 'templates/AgregarCategoria.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

}  
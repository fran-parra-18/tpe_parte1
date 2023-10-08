<?php

class ProductosModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=comercio;charset=utf8', 'root', '');
    }

    function getProductos(){
        $query = $this->db->prepare('SELECT A.id,A.producto,A.precio,A.stock,B.Nombre FROM productos A INNER JOIN categorias B ON A.categoriaID=B.CategoriaID');
        $query-> execute();

        $productos =$query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
 
    function insertProducto($producto, $precio, $categoria) {        
    
        $query = $this->db->prepare('INSERT INTO productos (producto, precio, categoriaID) VALUES(?,?,?)');
        $query->execute([$producto, $precio, $categoria]);
    
        return $this->db->lastInsertId();
    }

    function deleteProducto($id){        
        
        $query = $this->db->prepare('DELETE FROM productos WHERE id=?');
        $query->execute([$id]);
    }

    function editProducto($producto, $precio, $categoria, $id){
        $query = $this->db->prepare('UPDATE productos SET producto=?, precio=?, categoriaID=? WHERE id=?');
        $query->execute([$producto, $precio, $categoria,$id]);

    }

    function showError($error) {
        require 'templates/error.phtml';
    }

}
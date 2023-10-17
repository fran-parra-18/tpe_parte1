<?php
require_once './app/models/model.php';
class ProductosModel extends Model{

    function getProductos(){
        $query = $this->db->prepare('SELECT A.id,A.producto,A.precio,A.stock,B.Nombre FROM productos A INNER JOIN categorias B ON A.categoriaID=B.CategoriaID');
        $query-> execute();

        $productos =$query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    function getProductoEspecifico($id){
        $query = $this->db->prepare('SELECT A.id,A.producto,A.precio,A.stock,B.Nombre FROM productos A INNER JOIN categorias B ON A.categoriaID=B.CategoriaID WHERE A.id=?');
        $query-> execute([$id]);

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

    function getProductosByCategoria($categoriaID){ 
        $query = $this->db->prepare('SELECT A.id,A.producto,A.precio,A.stock,B.Nombre FROM productos A INNER JOIN categorias B ON A.categoriaID=B.CategoriaID WHERE A.categoriaID=?' );
        $query-> execute([$categoriaID]);

        $productos =$query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    

}
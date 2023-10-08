<?php

class CategoriaModel {
    private $db;

    function __construct() {
        // Configura la conexión a tu base de datos (ajusta los valores según tu configuración).
        $this->db = new PDO('mysql:host=localhost;dbname=comercio;charset=utf8', 'root', '');
    }

    public function obtenerCategorias() {
        // Aquí puedes implementar la lógica para obtener las categorías de tu base de datos.
        $query = $this->db->query('SELECT * FROM categorias');

        $categorias =$query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getProductosXCategoria($categoria){        

        $query = $this->db->prepare('SELECT A.id,A.producto,A.precio,A.stock,B.Nombre FROM productos A INNER JOIN categorias B ON A.categoriaID=B.CategoriaID WHERE B.Nombre="?"' );
        $query-> execute($categoria);

        $productos =$query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
}
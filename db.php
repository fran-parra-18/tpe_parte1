<?php

function showProductos() {
    $db = new PDO('mysql:host=localhost;dbname=comercio;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM productos');
    $query-> execute();


    $productos = $query->fetchAll(PDO :: FETCH_OBJ);

    echo "<ul>";
    foreach($productos as $producto){
        echo "<li> $producto->id - $producto->categoria - $producto->producto - $producto->precio </li>";
    
    }
    echo "</ul>";
}

showProductos();
?>
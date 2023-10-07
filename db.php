<?php

function getConection() {
    return new PDO('mysql:host=localhost;dbname=comercio;charset=utf8', 'root', '');
}

function showProductos() {
    include_once 'templates/header.phtml';

    $db = getConection();
    $query = $db->prepare('SELECT * FROM productos');
    $query-> execute();


    $productos = $query->fetchAll(PDO :: FETCH_OBJ);

    echo "<table class='table table-hover'>";
        echo "<thead>
                <tr>
                    <th>#ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>                
                </tr>
            </thead>
            <tbody>";    
        foreach($productos as $producto){
            echo "<tr>
                    <td>$producto->id</td>
                    <td>$producto->producto</td>
                    <td>$producto->precio</td>
                    <td>$producto->categoria</td>   
                    <td>$producto->nombre</td>
                </tr>";
        
        }
        echo"</tbody>
            </table>";
    include_once 'templates/footer.phtml';
}
function addProducto(){

}
function insertProducto($producto, $precio, $categoria,$proveedor) {

    $db = getConection();

    $query = $db->prepare('INSERT INTO productos (producto, precio, categoria, id_proveedor) VALUES(?,?,?,?)');
    $query->execute([$producto, $precio, $categoria,$proveedor]);

    return $db->lastInsertId();
}
?>
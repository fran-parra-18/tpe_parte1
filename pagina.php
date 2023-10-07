<?php 
require_once 'db.php';
function showHome(){
    include_once 'templates/header.phtml'?>
    <div>
        <span>HOME DE LA PAGINA</span>
    </div>
    <?php
    $clave= password_hash ("admin" , PASSWORD_DEFAULT );
    echo $clave;
    include_once 'templates/footer.phtml';
}

function showAgregar(){
    include_once 'templates/header.phtml'?>
    
    <form id="form" action="agregado" method="POST" class="my-4">
        <label >PRODUCTO</label>
        <input name="producto" type="text">
        <label>PRECIO</label>
        <input name="precio" type="number" min="1">
        <label>CATEGORIA</label>
        <select name="categoria" class="form-select" aria-label="Default select example">
            <option selected>Seleccione categoria</option>
            <option value="Electronica">electronica</option>
            <option value="Indumentaria">indumentaria</option>
            <option value="Hogar">hogar</option>            
        </select>
        <label>PROVEEDOR</label>
        <select name="proveedor"class="form-select" aria-label="Default select example">
            <option selected>Seleccione proveedor</option>
            <option value="1">Samsung</option>
            <option value="2">Sony</option>
            <option value="3">IKEA</option>
            <option value="4">Nike</option>
            <option value="5">Adidas</option>
        </select>
        <input type="submit">
    </form>
    
    <?php
    include_once 'templates/footer.phtml';

}

function productoAgregado(){
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $categoria=$_POST['categoria'];
    $proveedor=$_POST['proveedor'];    

    $id = insertProducto($producto, $precio, $categoria,$proveedor);

    if ($id) {        
        header('Location: ' . BASE_URL . "agregar");
    } else {
        echo "Error al insertar la tarea";
    }
    
}

function showLogin(){
    include_once 'templates/login.phtml';
}
<?php
require_once 'app/controllers/productos.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/agregar.controller.php';
require_once 'app/controllers/editar.controller.php';
require_once 'app/controllers/categorias.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//home -> productos.controller->showProductos();


$action = 'home';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];    
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new productosController();
        $controller->showhome();
        break;
    case 'productos':
        $controller = new productosController();
        $controller->showProductos();
        break;
    case 'producto':
        $controller = new productosController();
        $controller->showProductoEspecifico($params[1]);
        break;
    case 'agregar':
        $controller = new agregarController();
        $controller->showAgregarProductos();
        break;
    case 'agregado':
        $controller = new agregarController();
        $controller->addProducto();
        break;
    case 'eliminar':
        $controller = new productosController();
        $controller->deleteProducto($params[1]);
        break;
    case 'editar':
        $controller = new editarController();
        $controller->showEditar($params[1]);
        break; 
    case 'editado':
        $controller = new editarController();
        $controller->editProducto($params[1]);
        break;
    case 'categoria':
        $controller = new productosController();
        $controller->mostrarProductosXCategoria($params[1]);
        break;
    case 'categorias':
        $controller = new categoriasController();
        $controller->mostrarCategorias();
        break;
    case 'Eliminar':
        $controller = new categoriasController();
        $controller->deleteCategoria($params[1]);
        break;
    case 'AgregarCategoria':
        $controller = new AgregarController();
        $controller->showAgregarCategoria(); 
        break;
    case 'CategoriaCreada':
        $controller = new AgregarController();
        $controller->addCategoria(); 
        break;
    case 'EditarCategoria':
        $controller = new editarController();
        $controller->showEditarCategoria($params[1]);
        break; 
    case 'EditadoCategoria':
        $controller = new editarController();
        $controller->editCategoria($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    default: 
        $controller = new productosController();
        $controller->showError();
        break;
        
}
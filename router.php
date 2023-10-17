<?php
require_once 'app/controllers/productos.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/agregar.controller.php';
require_once 'app/controllers/editar.controller.php';
require_once 'app/controllers/categorias.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//home               ->      productos.controller->showHome();
//productos          ->      productos.controller->showProductos();
//producto           ->      productos.controller ->showProductoEspecifico();
//agregar            ->      agregar.controller->showAgregar();
//agregado           ->      agregar.controller->addProducto();
//eliminar           ->      productos.controller->deleteProducto();
//editar             ->      editar.controller->showEditar();
//editado            ->      productos.controller->editProducto();
//categorias         ->      categorias.controller->mostrarCategorias();
//categoria          ->      categorias.controller->mostrarProductosXCategoria();
//eliminarCategoria  ->      categorias.controller->deleteCategoria();
//agregarCategoria   ->      categorias.controller->showAgregarCategoria();
//CategoriaCreada    ->      categorias.controller->addCategoria();
//EditarCategoria    ->      categorias.controller->showEditarCategoria();
//categoriaEditada   ->      categorias.controller->editCategoria($params[1]);
//login              ->      auth.controller->showLogin();
//logout             ->      auth.controller->logout();
//auth               ->      auth.controller->auth();

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
    case 'eliminarCategoria':
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
    case 'categoriaEditada':
        $controller = new editarController();
        $controller->editCategoria($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
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
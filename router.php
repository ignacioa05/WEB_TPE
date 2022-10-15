<?php
require_once './app/controllers/produc.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
//$taskController = new TaskController();


// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    case 'list':
        $producController = new ProducController();
        $producController->showProduc();
        break;
    case 'add':
        $producController = new ProducController();
        $producController->addProduc();
        break;
    case 'delete':
        $producController = new ProducController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $producController->deleteProduc($id);
        break;
    case 'goEditProduct': 
        $producController = new ProducController();
        $id = $params[1];
        $producController->goEditProduct($id); //modifico un producto
        break;
    case 'editProduct': 
        $producController = new ProducController(); 
        $producController->editProduct(); //modifico un producto
        break; 
    case 'mostrarProducto':
        $producController = new ProducController();
        $id= $params[1];
        $producController->verProducto ($id);
        break;
    case 'categorias':
        $producController = new ProducController();
        $id_categoria = $params[1];
        $producController->filtroCategorias($id_categoria); //voy a traerme los productos por categorias
        break; 
    case 'administrarCategorias':
        $producController = new ProducController();
        $producController->addCategoria();
        break;
    case 'addCategoria':
        $producController = new ProducController();
        $producController->addCateg();
        break;
    case 'deleteCategoria':
        $producController = new ProducController();
        $id = $params[1];
        $producController->deleteCategoria($id);
        break;
    case 'goEditCategoria': 
        $producController = new ProducController();
        $id = $params[1];
        $producController->goEditCategoria($id); //modifico un producto
        break;
    case 'editCategoria': 
        $producController = new ProducController(); 
        $producController->editCategoria(); //modifico un producto
        break; 
    default:
        echo('404 Page not found');
        break;
}

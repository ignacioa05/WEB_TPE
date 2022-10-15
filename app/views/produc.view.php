<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProducView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showAllProduc($productos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('productos', $productos);
        


        // mostrar el tpl
        $this->smarty->display('producList.tpl');
    }

    function showProduc ($producto, $categoria) {
        $this->smarty->assign ('producto', $producto);
        $this->smarty->assign ('categoria', $categoria);
        $this->smarty->display ('mostrarProduc.tpl');
    }

    function showFormEdit($id, $producto) {
        $this->smarty->assign('titulo', 'Editar producto');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('formEdit.tpl');
        
    }

    function showCategorias($productos) {
        $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('categoriasList.tpl');
    }

    function allCategorias ($categorias) {
        $this->smarty->assign('count', count($categorias)); 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('form_altaCategoria.tpl');
    }

    function showFormEditCategoria($id, $categorias) {
        $this->smarty->assign('titulo', 'Editar categoria');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categoria', $categorias);
        $this->smarty->display('formEditCateg.tpl');
    }

    function assign ($categorias) {
        $this -> smarty -> assign ('categorias', $categorias);
    }

}
<?php
require_once './app/models/produc.model.php';
require_once './app/views/produc.view.php';
require_once './app/helpers/auth.helper.php';
require_once './app/models/categoria.model.php';

class ProducController {
    private $model;
    private $view;
    private $authHelper;
    private $categorias;
    private $categoriaModel;
   

    public function __construct() {
        $this->model = new ProducModel();
        $this->view = new ProducView();
        $this ->authHelper = new AuthHelper();
        $this->categoriaModel = new categoriaModel ();
        $this->categorias = $this -> categoriaModel -> getAllCategorias();

    }

    public function showProduc() {
        session_start ();
        $this-> view ->assign ($this->categorias);

        $productos = $this->model->getAllProducandCategorias();
        $this->view->showAllProduc($productos);
        

    }

    
    function addProduc() {
        session_start ();
        $this ->authHelper ->checkLoggedIn(); //con esto no permito que agregue si no esta logueado 

        $title = $_POST['title'];
        $description = $_POST['description'];
        $precio = $_POST['precio'];
        $id_categorias = $_POST['categoria'];

        $id = $this->model->insertProduc($title, $description, $precio, $id_categorias);

        header("Location: " . BASE_URL); 
    }
   
    function deleteProduc($id) {
        session_start ();
        $this ->authHelper ->checkLoggedIn();
        
        $this->model->deleteProducById($id);
        header("Location: " . BASE_URL);
    }


    function goEditProduct($id) {
        
        $this ->authHelper ->checkLoggedIn();
        $this-> view ->assign ($this->categorias);
       
        $producto= $this->model->getProduct($id);// obtengo de la db solo ese producto
        $this->view-> showFormEdit($id, $producto);
    }

    function editProduct() {
       
        $this ->authHelper ->checkLoggedIn();
        $this-> view ->assign ($this->categorias);

        $productoE = new stdClass();
        $productoE->id = $_POST['id'];
        $productoE->titleE = $_POST['titleE'];
        $productoE->descriptionE = $_POST['descriptionE'];
        $productoE->precioE= $_POST['precioE'];
        $productoE->id_categoriasE = $_POST['id_categoriasE'];
        $this->model->updateP($productoE);
        header("Location: " . BASE_URL);

    }

    function verProducto ($id) {
       
        session_start ();
        $this-> view ->assign ($this->categorias);
        $producto = $this -> model-> getProduct ($id);
        $categoria = $this->categoriaModel -> getCategorias ($producto->id_categorias);
        $this -> view -> showProduc ($producto, $categoria);
    }

   
    function filtroCategorias ($id_categorias){
        session_start ();
        $this-> view ->assign ($this->categorias);

        if ($id_categorias != "todas"){ //si no son todas la categorias hago esto
        
        $productosCategorias = $this->model->getCategorias($id_categorias);
        $this->view-> showCategorias($productosCategorias);
       
        }

        else {

            $productos = $this->model->getAllProduc(); //aca llamo a la funcion de traerme todas
            $this->view-> showCategorias($productos); // luego paso al view como si fuera una categoria
            
        }
 
    }

    function addCategoria () {
        session_start ();
        $this-> view ->assign ($this->categorias);
        $this -> view -> allCategorias ($this -> categorias);

    } 

    function addCateg (){
        $this ->authHelper ->checkLoggedIn(); //con esto no permito que agregue si no esta logueado 

        $title = $_POST['title'];

        $this->categoriaModel->insertCategoria($title);
        header("Location: " . BASE_URL ."administrarCategorias");
    }

    function deleteCategoria ($id){
        session_start ();
        $this ->authHelper ->checkLoggedIn();

        $this-> categoriaModel -> deleteCateg ($id);
        header("Location: " . BASE_URL ."administrarCategorias");

    }

    function goEditCategoria($id) {

        
        $this ->authHelper ->checkLoggedIn();
       
        $categoria= $this->categoriaModel->getCategorias($id);// obtengo de la db solo ese producto
        $this->view-> showFormEditCategoria($id, $categoria);
   
    }

    function editCategoria() {
       
        $this ->authHelper ->checkLoggedIn();

        $categoriaCE = new stdClass();
        $categoriaCE->id = $_POST['id'];
        $categoriaCE->titleCE = $_POST['titleCE'];
        $this->categoriaModel->updateCE($categoriaCE);
        header("Location: " . BASE_URL ."administrarCategorias");

    }
    

}

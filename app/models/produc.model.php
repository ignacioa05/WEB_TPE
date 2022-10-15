<?php

class ProducModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_indumentariadepor;charset=utf8', 'root', '');
    }

    public function getAllProduc() {
        $query = $this->db->prepare("SELECT * FROM productos");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);   
        return $productos;
    }

    public function getAllProducandCategorias(){
        $query = $this ->db->prepare ("SELECT * FROM productos INNER JOIN categorias ON productos.id_categorias = categorias.id_categorias");
        $query->execute ();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);   
        return $productos;
    }
  
    public function insertProduc($title, $description, $precio, $id_categorias) {
        $query = $this->db->prepare("INSERT INTO productos (titulo, descripcion, precio, id_categorias) VALUES (?, ?, ?, ?)");
        $query->execute([$title, $description, $precio, $id_categorias]);

        return $this->db->lastInsertId();
    }

    function deleteProducById($id) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }


    function getProduct($id) {
        $query= $this->db->prepare("SELECT * FROM productos WHERE id= ?");
        $query-> execute([$id]);
        $product= $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    public function updateP($productoE) { 
        $query = $this->db->prepare('UPDATE productos SET titulo= ?, descripcion= ?, precio= ?, id_categorias= ? WHERE id = ?');
        $query->execute([$productoE->titleE, $productoE->descriptionE, $productoE->precioE, $productoE->id_categoriasE, $productoE->id]);
    }
    
    function getCategorias ($id_categorias){

        $query = $this->db->prepare('SELECT * FROM productos WHERE id_categorias= ?');
        $query ->execute ([$id_categorias]);
        $productosCategorias = $query -> fetchAll (PDO::FETCH_OBJ);
        return $productosCategorias;
    
    }
   
}
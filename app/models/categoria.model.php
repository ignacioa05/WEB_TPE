<?php

class categoriaModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_indumentariadepor;charset=utf8', 'root', '');
    }

    public function getAllCategorias() {
 
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);  
        return $categorias;

    }

    function insertCategoria ($title){

        $query = $this->db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $query->execute([$title]);

    }

    function deleteCateg ($id){
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categorias = ?');
        $query->execute([$id]);
    }

    function getCategorias($id) {
        $query= $this->db->prepare("SELECT * FROM categorias WHERE id_categorias= ?");
        $query-> execute([$id]);
        $categoria= $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    public function updateCE($categoriaCE) { 
        echo "entre a la db";
        $query = $this->db->prepare('UPDATE categorias SET nombre =? WHERE id_categorias = ?'); 
        echo "modifica datos?";
        $query->execute([$categoriaCE->titleCE, $categoriaCE->id]);
        echo "realiza el execute";

    } 
}  
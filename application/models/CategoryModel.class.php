<?php

class CategoryModel {

    private $dbh;

    public function __construct(){
        $this->dbh = new Database();
    }




    /*Méthode qui va renvoyer toutes les catégories*/
    public function listAll(){
        //connexion à la base de données
        return $this->dbh->query("SELECT * FROM categories");
        

    }




    public function add($name, $description, $image) {
        
        $this->dbh->executeSQL("INSERT INTO categories (cat_name, cat_description, cat_image) VALUES (?,?,?)",[$name, $description, $image]);
    }



    public function find($id) {
         // Connexion à la base de données
        
        return $this->dbh->queryOne("SELECT * FROM categories WHERE cat_id = ?", [$id]);
    }



    public function update($name, $description, $image,$id){
        
        $this->dbh->executeSql("UPDATE categories SET cat_name = ?, cat_description = ?, cat_image = ? WHERE cat_id = ?", [$name, $description, $image, $id]);
    }
    /* Méthode qui va supprimer une catégorie */
    public function delete($id){

         $this->dbh->executeSQL("DELETE FROM categories WHERE cat_id = ?",[$id]);
    }
}
<?php

class DelcategorieController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
        $id = $queryFields['id'];

        $categoryModel = new CategoryModel();
        //Suppression de la photo
        $picture = $categoryModel->find($id);
        $image = $picture['cat_image'];
        if(file_exists(WWW_PATH.'/img/tea/'.$image)){
            unlink(WWW_PATH.'/img/tea/'.$image);
        }
        /*Suppression d'une catégorie*/
        $categorie = $categoryModel->delete($id);
        //Création du flashbag
        $flashbag = new Flashbag();
        $flashbag->add('La catégorie a bien été supprimée');
        //redirige vers la liste des catégories
        $http->redirectTo('admin/categories');

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    }

}
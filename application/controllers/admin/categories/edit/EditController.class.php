<?php

class EditController{

    public function httpGetMethod(Http $http, array $queryFields)
    {
		// Récupérer l'identifiant dans l'URL
        $id = $queryFields['id'];
        
        // Aller chercher dans la BDD les infos de la catégorie
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        return [
            'category' => $category  
          ];
	
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        if ($http->hasUploadedFile('image')) {
            $photo=$http->moveUploadedFile('image', '/img/tea');
        }
        else { 
            $photo = $formFields['originalImage']; 
        }   

        $categoryModel = new CategoryModel(); 
        $categoryModel->update( $formFields['name'], $formFields['description'], $photo,$formFields['id']);

                //Ajout du flashbag
                $flashbag = new Flashbag();
                $flashbag->add('La catégorie a bien été modifiée');
        $http->redirectTo('admin/categories');
    }




}
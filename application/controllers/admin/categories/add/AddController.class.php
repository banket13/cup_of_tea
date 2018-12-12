<?php

class AddController{

    public function httpGetMethod(Http $http, array $queryFields)
    {
		
	
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        // Traitement de l'image
        if ($http->hasUploadedFile('image')) {
            $photo=$http->moveUploadedFile('image', '/img/tea'); // On déplace la photo à l'endroit désiré (le chemin est relatif par rapport au dossier www)
        }



        // Enregistrer les données dans la base de données
        $categoryModel = new CategoryModel();
        $categoryModel->add($formFields['name'], $formFields['description'], $photo);

        //Ajout du flashbag
        $flashbag = new Flashbag();
        $flashbag->add('La catégorie a bien été ajoutée');
        // Rediriger sur la page d'accueil d'admin des catégories
        $http->redirectTo('admin/categories');
    }   





}
<?php

class ValidateUserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
       $form=[];
       foreach ($formFields as $key => $value) {
         $form[]=$value;
       };
       $db=new Database();
       $sql= 'INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `street`, `city`, `code_postal`, `tel`) VALUES (?,?,?,?,?,?,?,? )';
       $db->query($sql, $form);
    }
}

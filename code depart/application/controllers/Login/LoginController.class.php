<?php
class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    // $form=array_values($formFields);
     $db=new Database();
    $sql= 'SELECT * FROM `users` WHERE `last_name`=? ';
    $bob=$db->query($sql,["aq"]);
    var_dump ($bob);
    // die;
    var_dump (array_values(($bob)[1]));
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
    $form=array_values($formFields);
    $form=array_slice ($form,0,-1);
    $db=new Database();
    switch (end($formFields)) {
      case 'login':
      var_dump ($form);
      die;
      break;
      case 'validate':
      $sql= 'INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `street`, `city`, `code_postal`, `tel`) VALUES (?,?,?,?,?,?,?,? )';
      $db->query($sql, $form);
      break;

      default;



    }
  }
}

?>

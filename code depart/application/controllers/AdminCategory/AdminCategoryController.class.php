<?php

class AdmincategoryController

{


  public function httpGetMethod(Http $http, array $queryFields)
  {
    $result=array_values($queryFields);
    // var_dump ($result);
    // //
    // //
    if ($result!=[]) {
      // code...
      $db=new Database();
      $sql='SELECT * FROM `category` WHERE `category_name`=?';
      $reponse=$db->queryOne($sql,$result);
      // var_dump ($reponse["category_description"]);
      //return $reponse;
      $name=$reponse;
      return ['name' => $name];


    }



    /*
    * Méthode appelée en cas de requête HTTP GET
    *
    * L'argument $http est un objet permettant de faire des redirections etc.
    * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */
  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $formFields=array_values($formFields);

    $form=array_slice ($formFields,0,-1);

    $db=new Database();

    switch (end($formFields)) {
      case 'category':
      $sql= 'INSERT INTO `category`(`category_name`, `category_description`) VALUES (?,?)';
      $db->($sql, $form);
      break;
      case 'erase_category':
      $sql= 'DELETE FROM `category` WHERE `category_name`=?';
      $db->query($sql,$form);
      break;
      case 'change_choosen_category':
      $sql= 'INSERT INTO `category`(`category_name`, `category_description`) VALUES (?,?)';
      $db->query($sql, $form);
      break;
      case 'validate_choosen_category':
      var_dump ($formFields);
      $sql= 'UPDATE `category` SET (`category_name`, `category_description`) VALUES (?,?) WHERE `category_name`=$formFields[`category_name`] ';
      $db->query($sql, $form);
      break;

      default:
      // code...
      break;
    }


    // var_dump (end($formFields));

    /*
    * Méthode appelée en cas de requête HTTP POST
    *
    * L'argument $http est un objet permettant de faire des redirections etc.
    * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    */


}
}

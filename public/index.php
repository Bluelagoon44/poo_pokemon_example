<?php
//J'importe tous mes Controller et tous mes Model
require_once(__DIR__ . "/../src/models/Db.php");
require_once(__DIR__ . "/../src/models/repositories/PokemonRepository.php");
require_once(__DIR__ . "/../src/models/Pokemon.php");
require_once(__DIR__ . "/../src/controllers/Controller.php");
require_once(__DIR__ . "/../src/controllers/MainController.php");
require_once(__DIR__ . "/../src/controllers/PokemonController.php");
require_once(__DIR__ . "/../core/Router.php");

try{
    //Je crée un objet de mon routeur
   $app = new Router();
   //J'appelle la fonction qui gère les routes (donc qui renvoie l'utilisateur vers le bon controller)
   $app->start();
}
catch(PDOException $e){
    die($e->getMessage());
}
 
?>
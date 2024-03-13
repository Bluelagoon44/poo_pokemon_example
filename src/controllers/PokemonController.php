<?php
//Controller de ma page Login
class PokemonController extends Controller{
  
  //Affiche et gère la logique de la page
  public function index(){
    $urlSplitted = explode("/",$_SERVER['REQUEST_URI']);
    // On récupère le pokemon dans la db grâce à l'id envoyé depuis le bouton submit du formulaire
    $pokemonDb = Pokemon::getPokemonById($urlSplitted[count($urlSplitted)-1]);
    // On met le dernier paramètre à 0 pour indiquer qu'on le relâche
    $pokemon = new Pokemon($pokemonDb["id"], $pokemonDb["name"], $pokemonDb["captured"]);
    //J'affiche le code html de ma page en important la view
    require(__DIR__ . "/../../views/pokemon.php");
  }
}
?>
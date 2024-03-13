<?php
class MainController extends Controller{
    public function index(){
        try{
            if(isset($_POST["capture"])){
                // On récupère le pokemon dans la db grâce à l'id envoyé depuis le bouton submit du formulaire
                $pokemonDb = Pokemon::getPokemonById($_POST["capture"]);
                if($pokemonDb["captured"]===0){
                    // On met le dernier paramètre à 1 pour indiquer qu'on l'a bien capturé
                    $pokemon = new Pokemon($pokemonDb["id"], $pokemonDb["name"], 1);
                    // On l'update dans la db
                    Pokemon::updateDb($pokemon);
                }
            }
            elseif(isset($_POST["free"])){
                // On récupère le pokemon dans la db grâce à l'id envoyé depuis le bouton submit du formulaire
                $pokemonDb = Pokemon::getPokemonById($_POST["free"]);
                // On met le dernier paramètre à 0 pour indiquer qu'on le relâche
                $pokemon = new Pokemon($pokemonDb["id"], $pokemonDb["name"], 0);
                // On l'update dans la db
                Pokemon::updateDb($pokemon);
            }
    
            // On récupère tous les pokemons déjà capturés
            $pokemonsCapturedDb = Pokemon::getCapturedPokemons();
            // On les stocke en tant qu'objets dans un tableau pour pouvoir s'en servir dans la vue
            $pokemons = [];
            // On crée tous nos objets qu'on insère dans le tableau
            foreach($pokemonsCapturedDb as $pokemon){
                $pokemons[] = new Pokemon($pokemon["id"], $pokemon["name"], $pokemon["captured"]);
            }
    
            // On récupère tous les pokemons sans exception
            $pokemonsDb = Pokemon::getPokemons();
            // On génère un chiffre aléatoire entre 0 et le nombre de pokemons dans la db
            $rand = rand(0, count($pokemonsDb)-1);
            // On crée le pokemon choisit aléatoirement grâce à la variable précédente
            $randomPokemon = new Pokemon($pokemonsDb[$rand]["id"], $pokemonsDb[$rand]["name"], $pokemonsDb[$rand]["captured"]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        //On affiche la vue, elle aura accès à toutes les variables créées plus tôt dans le Controller (donc $user, $posts, ...)
        require(__DIR__ . "/../../views/main.php");
    }
}
?>
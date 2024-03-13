<?php
abstract class PokemonRepository extends Db{
    private static function request($request){
        //Je me connecte à la db et j'exécute la requête
        $result = self::getInstance()->query($request);
        //Je me déconnecte de la db
        self::disconnect();
        //Je retourne le résultat de la requête
        return $result;
    }

    public static function getPokemons(){
        return self::request("SELECT * FROM pokemon")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCapturedPokemons(){
        return self::request("SELECT * FROM pokemon WHERE captured=1")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPokemonById($id){
        return self::request("SELECT * FROM pokemon WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPokemonByName($name){
        return self::request("SELECT * FROM pokemon WHERE name=$name")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertIntoDb(Pokemon $pokemon){
        return self::request("INSERT INTO pokemon(name, captured) VALUES('". $pokemon->getName() ."', " . $pokemon->getCaptured() . ")");
    }

    public static function updateDb(Pokemon $pokemon){
        return self::request("UPDATE pokemon SET name='". $pokemon->getName() ."', captured=" . $pokemon->getCaptured() . " WHERE id=" . $pokemon->getId());
    }

    public static function removeFromDb(Pokemon $pokemon){
        return self::request("DELETE FROM pokemon WHERE id=" . $pokemon->getId());
    }
}
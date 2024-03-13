<?php
//Création de notre classe Post afin de rajouter une couche de protection à nos données
class Pokemon extends PokemonRepository{
  private $id;
  private $name;
  private $captured;
  
  //Création de notre Pokemon
  public function __construct($id, $name, $captured){
    $this->id=htmlspecialchars($id);
    $this->setName($name);
    $this->setCaptured($captured);
  }

  //Accesseurs et Mutateurs
  public function getId(){ return $this->id; }

  public function setName($name){ $this->name = htmlspecialchars($name); }
  public function getName(){ return $this->name; }

  public function setCaptured($captured){ $this->captured = htmlspecialchars($captured); }
  public function getCaptured(){ return $this->captured; }
}
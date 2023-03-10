<?php

abstract class Modele{

    public $bdd; // Objet PDO d'accès à la BD
  
    
    protected function executerRequete($sql, $params = null) { // Exécute une requête SQL éventuellement paramétrée
      if ($params == null) {
        $resultat = $this->getBdd()->query($sql);    // exécution directe
      }
      else {
        $resultat = $this->getBdd()->prepare($sql);  // requête préparée
        $resultat->execute($params);
      }
      return $resultat;
    }

    private function getBdd() {
      if($this->bdd == null) { //Création de la connexion
      $this->bdd = new PDO('mysql:host='.HOST.';dbname='.BDD_NAME.';charset=utf8', BDD_USER, BDD_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      return $this->bdd;
    }
}

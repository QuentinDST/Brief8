<?php

require_once 'modele/modele.php';

class Panier extends Modele {
    
    private $articles = array();
    private $cookieName = "mon_panier";
    
    function __construct() {
        if(isset($_COOKIE[$this->cookieName])) {
            var_dump($_COOKIE);
            $this->articles = unserialize($_COOKIE[$this->cookieName]);
        }
    }
    
    function ajouterArticle($idArticle, $quantite) {
        if(isset($this->articles[$idArticle])) {
            $this->articles[$idArticle] += $quantite;
            echo "coucou";
        } else {
            $this->articles[$idArticle] = $quantite;
        }
        $this->sauvegarderPanier();
    }
    
    function retirerArticle($idArticle) {
        unset($this->articles[$idArticle]);
        $this->sauvegarderPanier();
    }
    
    function viderPanier() {
        $this->articles = array();
        $this->sauvegarderPanier();
    }
    
    function getCookies() {
        return $this->articles;
    }
    
    private function sauvegarderPanier() {
        setcookie($this->cookieName, serialize($this->articles), time() + (86400 * 30), "/");
    }
}

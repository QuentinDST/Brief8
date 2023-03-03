<?php

require_once 'modele/modele.php';

class Panier extends Modele {
    
    private $articles = array();
    private $cookieName = "mon_panier";
    
    function __construct() {
        if(isset($_COOKIE[$this->cookieName])) {
            $this->articles = unserialize($_COOKIE[$this->cookieName]);
        }
    }
    
    function ajouterArticle($idArticle, $quantite) {
        if(isset($this->articles[$idArticle])) {
            $this->articles[$idArticle] += $quantite;
        } else {
            $this->articles[$idArticle] = $quantite;
        }
        $this->sauvegarderPanier();
    }

    
    public function reduireArticle($idArticle, $quantite) {
        if(isset($this->articles[$idArticle])) {
            if($this->articles[$idArticle] > 0){
                $this->articles[$idArticle] -= $quantite;
            }
            if ($this->articles[$idArticle] == 0 ){
                unset($this->articles[$idArticle]);
            }
        } else {
            $this->articles[$idArticle] = $quantite;
        }
        $this->sauvegarderPanier();
    }
    
    function viderPanier() {
        $this->articles = array();
        $this->sauvegarderPanier();
    }
    
    function calculerMontantTotal() {
        $total = 0;

    }

    function getCookies() {
        var_dump($this->articles);
        return $this->articles; 
        
    }
    
    private function sauvegarderPanier() {
        $newArticle = array();
        foreach($this->articles as $article => $quantite){
            if ($quantite >= 0){
                 $newArticle[$article] = $quantite;
            }
        }
        
        setcookie($this->cookieName, serialize($newArticle), time() + (86400 * 30), "/");
    }
}
<?php

require_once("modele/panier.php");
require_once("modele/modele.php");
require_once("vue/vue.php");

class ControleurPanier extends Modele{
    
    private $panier;
    private $articleAdded;

    public function __construct() {
        $this->panier = new Panier();
    }
    
    public function ajouterArticle($idArticle, $quantite ) {
        $this->panier->ajouterArticle($idArticle, $quantite);
        $this->afficherPanier();
    }
    
    public function retirerPanier($idArticle) {
       $this->panier->retirerArticle($idArticle);
        $this->afficherPanier();
    }
    
    public function viderPanier() {
        $this->panier->vider();
        $this->afficherPanier();
    }
    
    public function afficherPanier() {
        $panier = $this->panier->getCookies();
        var_dump($panier);
        $getArticle = array();
        if(!empty($panier)){
            foreach($panier as $key => $value){
                $this->articleAdded = new Article();
                $tmp = $this->articleAdded->getArticle($key);
                array_push($getArticle, $tmp);
        } 

        $vue = new Vue('Panier');
        $vue->generer(array('panier' => $panier, 'article' => $getArticle));
        }
    }   
}


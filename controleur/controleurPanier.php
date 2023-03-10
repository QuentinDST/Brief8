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
    
    public function supprimerArticle($idArticle) {
        $this->panier->supprimerArticle($idArticle);
        $this->afficherPanier();
    }
    
    public function reduireArticle($idArticle, $quantite) {
        if ($quantite > 0) {
            $this->panier->reduireArticle($idArticle, $quantite);
        } else {
            $this->panier->supprimerArticle($idArticle, $quantite);
        }
        $this->afficherPanier();
    }
    
    public function viderPanier() {
        $this->panier->viderPanier();
        $this->afficherPanier();
    }
    
    public function afficherPanier() {
        $panier = $this->panier->getCookies();
        $getArticle = array();
        if(!empty($panier)){
            foreach($panier as $key => $value){
                $this->articleAdded = new Article();
                $tmp = $this->articleAdded->getArticle($key);
                $tmp['quantite'] = $value;
                array_push($getArticle, $tmp);
            } 
        }
        
        $vue = new Vue('Panier');
        $vue->generer(array('panier' => $panier, 'getArticle' => $getArticle, 'total' => $total)) ; 
    }   
}

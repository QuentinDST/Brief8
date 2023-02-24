<?php 

require_once 'modele/article.php';
require_once 'vue/vue.php';

class ControleurAccueil {

    private $article;
    
    //instancie la class modele requise
    
    public function __construct(){
        $this->article=new Article();
    }

    // Utilise les méthodes pour récupérer les données nécessaire au vue

    public function accueil(){
        $articles = $this->article->getArticles();
        $vue = new vue('Accueil');
        $vue->generer(array('articles' => $articles));
    }
}


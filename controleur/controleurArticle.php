<?php 

require_once 'modele/article.php';
require_once 'vue/vue.php';

class ControleurArticle {
    private $article;

    //instancie la class modele requise

    public function __construct() {
        $this->article=new Article();
    }

    // Utilise les méthodes pour récupérer les données nécessaire au vue

    public function article($idArticle){
        $article = $this->article->getArticle($idArticle);
        $vue = new vue('Article'); 
        $vue->generer(array('article' => $article));
    }
}

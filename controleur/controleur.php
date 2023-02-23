<?php

require 'modele/article.php';

function accueil() {
  $article = new Article();
  $articles = $article->getArticles();
  require 'vue/vueAccueil.php';
}
  
// Affiche les détails sur un article
function article($idArticle) {
  $article = new Article();
  $article = $article->getArticle($idArticle);
  require 'vue/vueArticle.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'vue/vueErreur.php';
}
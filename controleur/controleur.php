<?php

require 'modele/modele.php';

function accueil() {
  try {
    $articles = getArticles();
    var_dump($articles) ;
    require 'vue/vueAccueil.php';
  }
  catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vue/vueErreur.php';
  }
}
?>

<?php 
// Affiche les détails sur un billet
function article($idArticle) {
  $article = getArticle($idArticle);
  require 'vue/vueArticle.php';
};?>

<?php
// Affiche une erreur
function erreur($msgErreur) {
  require 'vue/vueErreur.php';
}
?>
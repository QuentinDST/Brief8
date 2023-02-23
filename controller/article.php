<?php

require 'modele/modele.php';
/* 
try {
  if (isset($_GET['action']) === 'article' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id != 0) {
      $article = getArticle($id);
      require 'vue/vueArticle.php';
    
    } else {
      throw new Exception("Identifiant d'article incorrect");
    }
  } else {
    throw new Exception("Action ou identifiant d'article incorrect");
  }
} catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'vue/vueErreur.php';
} */

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
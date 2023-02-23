<?php

// Renvoie l'ensemble de mes articles, triés par catégories

function getArticles() {
  $bdd= getBdd();
  $articles = $bdd->query('SELECT code_article, nom, prix, image as img
   FROM article;');
  return $articles;
}


//Renvoie l'information d'un article dans une nouvelle page

function getArticle($idArticle) {
    $bdd = getBdd();

    $article = $bdd->prepare('SELECT `code_article` as id, `nom`, `description`, `prix`, image as img FROM article WHERE code_article = ?;');
    $article->execute(array($idArticle));
    if ($article->rowCount() == 1)
      return $article->fetch();  // Accès à la première ligne de résultat
    else
     throw new Exception("Aucun article ne correspond à l'identifiant '$idArticle'");
  }

//Connexion à ma BDD

function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=bixmusic;charset=utf8', 'root', '');
    return $bdd;
}
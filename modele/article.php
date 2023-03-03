<?php

require_once 'modele/modele.php';

class Article extends Modele{
    
    // Renvoie l'ensemble de mes articles
    function getArticles() {
      $sql = 'SELECT code_article, nom, prix, image as img, Qte_stock as stock FROM article;';
      $articles = $this->executerRequete($sql);
      return $articles;
    }

    //Renvoie l'information d'un article dans une nouvelle page
    function getArticle($idArticle) {
      $sql = 'SELECT `code_article` as id, `nom`, `description`, `prix`, image as img FROM article WHERE code_article = ?;';
      $article = $this->executerRequete($sql, array($idArticle));
      if ($article->rowCount() == 1)
        return $article->fetch();  // Accès à la première ligne de résultat
      else
       throw new Exception("Aucun article ne correspond à l'identifiant '$idArticle'");
      }
}
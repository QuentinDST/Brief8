<?php 

require 'controller/article.php';

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'article') {
      if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if ($id != 0)
          article($id);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    accueil();
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}

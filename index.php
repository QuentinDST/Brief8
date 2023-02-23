<?php 

// Controleur Frontal: point d'entrée unique du site
// 1. Le contrôleur frontal analyse la requête entrante et vérifie les paramètres fournis ;
// 2. Il sélectionne et appelle l'action à réaliser en lui passant les paramètres nécessaires ;
// 3. Si la requête est incohérente, il signale l'erreur à l'utilisateur.

require 'controleur/controleur.php';

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

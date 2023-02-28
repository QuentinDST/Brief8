<?php

class Vue {

  private $fichier; // Nom du fichier associé à la vue
  private $titre; // Titre de la vue (défini dans le fichier vue)
  private $vueGeneree = false;

  public function __construct($action) { // Détermination du nom du fichier vue à partir de l'action
      $this->fichier = "vue/vue" . $action . ".php";
  }

  public function generer($donnees) { // Génère et affiche la vue
      //$this->titre = $donnees['titre']; // Récupération du titre de la vue
      $contenu = $this->genererFichier($this->fichier, $donnees); // Génération de la partie spécifique de la vue
      $vue = $this->genererFichier('vue/template.php', array('titre' => $this->titre, 'contenu' => $contenu)); // Génération du gabarit commun utilisant la partie spécifique
      echo $vue; // Renvoi de la vue au navigateur
      $this->vueGeneree = true;
  }

  private function genererFichier($fichier, $donnees) { // Génère un fichier vue et renvoie le résultat produit
      if (file_exists($fichier)) {
          extract($donnees);// Rend les éléments du tableau $donnees accessibles dans la vue
          ob_start(); // Démarrage de la temporisation de sortie
          require $fichier; // Inclut le fichier vue
          return ob_get_clean(); // Renvoi du tampon de sortie
      }
      else {
          throw new Exception("Fichier '$fichier' introuvable");
      }
  }
}
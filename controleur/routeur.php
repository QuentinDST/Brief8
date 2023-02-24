<?php 

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurArticle.php';
require_once 'vue/vue.php';

class Routeur{

    private $controlAcceuil;
    private $controlArticle;

    public function __construct() {
        $this->controlAccueil = new ControleurAccueil();
        $this->controlArticle = new ControleurArticle();
      }

    public function routerRequete(){
        try {
            if (isset($_GET['action'])) {
              if ($_GET['action'] == 'article') {
                if (isset($_GET['id'])) {
                  $id = intval($_GET['id']);
                  if ($id != 0)
                    $this->controlArticle->article($id);
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
              $this->controlAccueil->accueil();
            }
          }
          catch (Exception $e) {
              erreur($e->getMessage());
          }
    }

    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
      }
}
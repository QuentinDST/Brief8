<?php 

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurArticle.php';
require_once 'controleur/controleurPanier.php';
require_once 'vue/vue.php';

class Routeur{

    private $controlAccueil;
    private $controlArticle;
    private $controlPanier;

    public function __construct() {
        $this->controlAccueil = new ControleurAccueil();
        $this->controlArticle = new ControleurArticle();
        $this->controlPanier = new ControleurPanier();
    }

    public function routerRequete(){
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'article':
                        if (isset($_GET['id'])) {
                            $id = intval($_GET['id']);
                            if ($id != 0)
                                $this->controlArticle->article($id);
                            else
                                throw new Exception("Code article non valide");
                        }
                        else
                            throw new Exception("Id article non défini");
                        break;
    
                    case 'panier':
                        if (isset($_GET['id'])) {
                            $idArticle = intval($_GET['id']);
                            if ($idArticle != 0){
                                echo "<script>alert('article ajouté au panier')</script>";
                                $quantite= 1;
                                $this->controlPanier->ajouterArticle($idArticle, $quantite);
                            }
                            else
                                throw new Exception("Code article non valide");
                        }
                        else {
                            $this->controlPanier->afficherPanier(); 
                        }
                        break;
    
                    case 'viderPanier':
                        $this->controlPanier->viderPanier();
                        break;  
    
                    default:
                        throw new Exception("Action non valide");
                        break;
                }
            }
            else {
                $this->controlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}

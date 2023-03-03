<?php 

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurArticle.php';
require_once 'controleur/controleurPanier.php';
require_once 'controleur/controleurBackOffice.php';
require_once 'vue/vue.php';

class Routeur{

    private $controlAccueil;
    private $controlArticle;
    private $controlPanier;
    private $controlBackOffice;

    public function __construct() {
        $this->controlAccueil = new ControleurAccueil();
        $this->controlArticle = new ControleurArticle();
        $this->controlPanier = new ControleurPanier();
        $this->controlBackOffice = new ControleurBackOffice();
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

                    case 'reduireArticle':
                        if (isset($_GET['id'])) {
                            $idArticle = intval($_GET['id']);
                            if ($idArticle != 0){
                                $quantite= 1;
                                $this->controlPanier->reduireArticle($idArticle, $quantite);
                            }
                            else {
                                throw new Exception("Code article non valide");
                            }
                        }
                        else {
                            $this->controlPanier->afficherPanier(); 
                        }
                        break;
    
                    case 'viderPanier':
                        $this->controlPanier->viderPanier();
                        break;  
                        
                    case 'authentifier':
                        if (session_status()!='PHP_SESSION_ACTIVE'){
                            session_start();
                            var_dump($_SESSION);
                        }
                        if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
                            $verif = $this->controlBackOffice->verifierIdentifiants($_SESSION['login'], $_SESSION['mdp']);                          
                            if ($verif) {
                                $this->controlBackOffice->afficherPageBackOffice();
                            } else {                    
                               $this->controlBackOffice->afficherVueLogin();
                            }
                        } else { 
                            $this->controlBackOffice->afficherVueLogin();
                        }
                       
                        break;

                    case 'deconnexion':
                        if (session_status()!='PHP_SESSION_ACTIVE'){
                            session_start();
                          }
                          $this->controlBackOffice->seDeconnecter();
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
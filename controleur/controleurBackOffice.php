<?php

require_once 'vue/vue.php';

class ControleurBackOffice {
    
    function verifierIdentifiants($admin, $password) {        
        if(ACCESS_ADMIN_USERNAME === $admin && ACCESS_ADMIN_PASSWORD === $password) {
            return true;
        } else {
            return false;
        }
    }

    function seConnecter(){
        if(isset($_POST['login']) && isset($_POST['mdp'])){
            if (session_status()!='PHP_SESSION_ACTIVE'){
                session_start();
            }
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['mdp'] = $_POST['mdp'];
            $connecte = $this->verifierIdentifiants($_SESSION['login'], $_SESSION['mdp']);
            if ($connecte){
                $this->afficherPageBackOffice();
            }
            else {
                /* $this->afficherVueLogin(); */
                echo "mot de passe incorrecte";

            }
        }
    }

    function seDeconnecter() {
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['mdp']);
        session_destroy();
        echo "session fermé";
        header('Location: index.php');
        exit();
    }

    function afficherVueLogin(){
        echo "Vue";
        $this->seConnecter();
        $vue = new Vue("Login");
        $vue->generer(array());
       

    }
    function afficherPageBackOffice() {
        $vue = new Vue("BackOffice");
        $vue->generer(array());
    }
}
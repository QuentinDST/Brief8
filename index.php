<?php 

// Controleur Frontal: point d'entrée unique du site
// Instancie le routeur et lui fait router la requête


/* session_start();
$_SESSION['admin'] = null;
 */


/* unset($_SESSION['Admin']);
session_destroy(); */




require 'controleur/routeur.php';
require 'contenu/config/config.php';

$routeur = new Routeur();
$routeur->routerRequete();


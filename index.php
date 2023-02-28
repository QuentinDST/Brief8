<?php 

// Controleur Frontal: point d'entrée unique du site
// Instancie le routeur et lui fait router la requête

require 'controleur/routeur.php';
require 'contenu/config/config.php';

$routeur = new Routeur();
$routeur->routerRequete();


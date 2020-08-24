<?php
// On signale qu'on utilisera les données de la session
// dans ce script
session_start();

// Importation du fichier de gestion de la base de données
require_once '../utilitaires/donnees.php';

// Vérification de l'existence du jeton
if (!isset($_POST["_jeton_"]) or empty($_POST["_jeton_"])) {
    redirection("../pages/connexion.php");
}

// Récupération du jeton
$jeton = $_POST["_jeton_"];

// Vérification du jeton
$params = array(
    "collection" => "comptes",
    "critere" => ["jeton" => $jeton]
);

$bdd = new Donnees();
$res = $bdd->get($params);

if (!$res) {
    $_SESSION["message"] = 'Aucun compte n\'est associé à ce jeton';
    redirection("../pages/connexion.php");
}

// Enregistrement du jeton dans la session
$_SESSION["_jeton_"] = $jeton;

// On redirige vers le panel
redirection("../pages/panel.php");

// Fonction pour rediriger vers une autre page
function redirection($destination)
{
    header("Location: $destination");
    exit();
}

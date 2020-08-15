<?php
// On signale qu'on utilisera les données de la session
// dans ce script
session_start();

// Vérification de l'existence du jeton
if (!isset($_POST["_jeton_"]) or empty($_POST["_jeton_"])) {
    redirection("../pages/connexion.php");
}

// Récupération du jeton
$jeton = $_POST["_jeton_"];

// Enregistrement du jeton dans la session
$_SESSION["_jeton_"] = $jeton;

// 


// On redirige vers le panel
redirection("../pages/panel.php");

// Fonction pour rediriger vers une autre page
function redirection($destination)
{
    header("Location: $destination");
    exit();
}


?>
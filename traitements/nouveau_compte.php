<?php
session_start();

// Importation du fichier de gestion de la base de données
require_once '../utilitaires/donnees.php';

// Récupération des infos
$params = $_POST;

// Validation
$params['bits'] = intval($params['bits']);
$params['nom'] = trim($params['nom']);
$params['prenom'] = trim($params['prenom']);

$data = array(
    'collection' => 'comptes',
    'document' => $params
);

// Création du compte
$res = Donnees::add($data);

if (!$res) {
    $_SESSION['erreur'] = 'Une erreur s\'est produite lors de la tentative de création du compte.';
    header('Location: ../pages/comptes.php');
    exit();
}

if (isset($res['error']) and $res['error'] == true) {
    $_SESSION['erreur'] = $res['message'];
} else {
    $_SESSION['message'] = 'Le compte a bien été créé.';
}

// Redirection vers la liste des comptes
header('Location: ../pages/comptes.php');
exit();

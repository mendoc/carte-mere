<?php
// On signale qu'on utilisera les données de la session
// dans ce script
session_start();

// Suppression du jeton de la session
session_destroy();

// Redirection vers la page de connexion
header("Location: ../pages/connexion.php");
exit();

<?php
// On signale qu'on utilisera les données de la session
// dans ce script
session_start();

// Vérification de l'existence du jeton dans la session
if (!isset($_SESSION["_jeton_"]) or empty($_SESSION["_jeton_"])) {
    header("Location: connexion.php");
    exit();
}

// On précise le fuseau horaire et sous quelle langue 
// la date et l'heure s'affichera
date_default_timezone_set('Africa/Libreville');
setlocale(LC_ALL, "fr_FR.utf8", "fra");

// Récupération des comptes
require_once '../utilitaires/donnees.php';

$comptes = Donnees::get(['collection' => 'comptes']);
//$comptes = [];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Mère | Comptes</title>

    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <link href="../public/assets/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/style.css">

</head>

<body class="">
    <main class="flex bg-blue-800">
        <div class="w-1/6 h-screen bg-blue-800">
            <div class="flex flex-col items-center justify-center mt-12">
                <img class="rounded-full w-32 border-2" src="../public/assets/img/profil.svg" alt="Photo de profil">
                <p class="mt-3 font-bold text-white">Dimitri ONGOUA</p>
                <span class="bg-orange-600 text-white font-bold px-1 rounded-md">105 bits</span>
            </div>
            <ul class="my-8 bg-blue-2040">
                <li class="font-bold text-white cursor-pointer px-5 py-2"><a href="panel.php"><span class="transition duration-500 block transform hover:translate-x-2">Panel</span></a></li>
                <li class="font-bold text-white cursor-pointer px-5 py-2"><span class="transition duration-500 block transform hover:translate-x-2">Mes bits</span></li>
                <li class="font-bold text-white cursor-pointer px-5 py-2"><span class="transition duration-500 block transform hover:translate-x-2">Mes informations</span></li>
                <li class="font-bold cursor-pointer px-5 py-2 bg-gray-200 text-blue-900"><span class="transition duration-500 block transform hover:translate-x-2">Comptes</span></li>
                <li class="font-bold text-white cursor-pointer px-5 py-2"><span class="transition duration-500 block transform hover:translate-x-2">Travaux</span></li>
            </ul>
            <a class="flex items-center justify-center text-gray-100 relative text-center bottom-0 block py-2 w-full px-4 transition duration-500 text-blue-400" href="../traitements/deconnexion.php">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="font-bold">Déconnexion</span>
            </a>
        </div>
        <div class="w-5/6 bg-gray-200">
            <div class="flex justify-between items-center border-b-2 px-4 py-4">
                <span class="font-bold text-2xl">Comptes</span>
                <span class="text-xl text-gray-700">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span><?= strftime("%A %e %B, %H:%M"); ?></span>
                </span>
            </div>
            <div class="flex justify-center px-8 py-5 <?= (isset($_SESSION['erreur']) or isset($_SESSION['message'])) ? "" : "invisible" ?>">
                <div class="bg-<?= (isset($_SESSION['erreur'])) ? "red" : "green" ?>-100 border border-<?= (isset($_SESSION['erreur'])) ? "red" : "green" ?>-400 text-<?= (isset($_SESSION['erreur'])) ? "red" : "green" ?>-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold"><?= (isset($_SESSION['erreur'])) ? "Oups" : "Bien" ?> !</strong>
                    <span class="block sm:inline"><?= (isset($_SESSION['erreur'])) ? $_SESSION['erreur'] : $_SESSION['message'] ?></span>
                </div>
            </div>
            <?php unset($_SESSION['erreur']); ?>
            <?php unset($_SESSION['message']); ?>
            <div class="px-8 py-2 flex">
                <div class="w-2/3 bg-white p-3 rounded-md border shadow px-8 pt-6 pb-8 mr-5">
                    <h2 class="font-bold text-lg border-b pb-4">Liste des comptes (<?= count($comptes) ?> au total)</h2>
                    <table class="table-auto w-full mt-5">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Nom(s) et prénom(s)</th>
                                <th class="px-4 py-2 text-left">Nombre de bits</th>
                                <th class="px-4 py-2 border-b text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($comptes as $compte) : ?>
                                <?php $id = array_keys($compte)[0]; ?>
                                <?php $compte = $compte[$id]; ?>
                                <tr>
                                    <td class="border px-4 py-2 border-r-0"><?= "{$compte['nom']} {$compte['prenom']}" ?></td>
                                    <td class="border px-4 py-2 border-l-0 border-r-0"><span class="px-2 bg-blue-800 font-bold text-white rounded-lg"><?= "{$compte['bits']}" ?></span></td>
                                    <td class="text-right border-b border-r">
                                        <div class="inline-flex">
                                            <button class="hover:text-blue-800 transform hover:scale-110 text-gray-800 px-4 py-2 rounded-l" title="Copier le jeton">
                                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="clipboard-copy w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                                                </svg>
                                            </button>
                                            <button class="hover:text-red-800 transform hover:scale-110 text-gray-800 px-4 py-2 rounded-r" title="Suspendre le compte">
                                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ban w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col w-1/3">
                    <div class="w-full bg-white shadow-md rounded-md px-8 pt-6 pb-8">
                        <h2 class="font-bold text-lg border-b pb-4">Nouveau compte</h2>
                        <form class="mt-5" method="POST" action="../traitements/nouveau_compte.php">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Nom(s) *
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" type="text" placeholder="Nom(s)" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Prénom(s)
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="prenom" type="text" placeholder="Prénom(s)">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Jeton *
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="jeton" placeholder="Le jeton associé au compte" required>
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Nombre de bits
                                </label>
                                <input min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="number" name="bits" value="0" placeholder="Nombre de bits">
                            </div>
                            <div class="flex">
                                <button class="bg-blue-800 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Créer le compte
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
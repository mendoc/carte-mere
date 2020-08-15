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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Mère</title>

    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <link href="../public/assets/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/style.css">

</head>

<body class="">
    <main class="flex">
        <div class="w-1/6 h-screen bg-blue-800">
            <div class="flex flex-col items-center justify-center mt-12">
                <img class="rounded-full w-32 border-2" src="https://avatars3.githubusercontent.com/u/19912551" alt="Photo de profil">
                <p class="mt-3 font-bold text-white">Dimitri ONGOUA</p>
                <span class="bg-orange-600 text-white font-bold px-1 rounded-md">105 bits</span>
            </div>
            <ul class="my-8 bg-blue-2040">
                <li class="font-bold cursor-pointer px-5 py-2 bg-gray-200 text-blue-900"><span class="transition duration-500 block transform hover:translate-x-2">Panel</span></li>
                <li class="font-bold text-white cursor-pointer px-5 py-2"><span class="transition duration-500 block transform hover:translate-x-2">Mes bits</span></li>
                <li class="font-bold text-white cursor-pointer px-5 py-2"><span class="transition duration-500 block transform hover:translate-x-2">Mes informations</span></li>
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
                <span class="font-bold text-2xl">Panel</span>
                <span class="text-xl text-gray-700">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span><?= strftime("%A %e %B, %H:%M"); ?></span>
                </span>
            </div>
            <div class="px-20 py-10 flex">
                <div class="bg-white p-3 rounded-md border shadow">
                    <h2 class="font-bold text-xl">Quantité</h2>
                    <p class="text-6xl mt-3 font-light">105 bits</p>
                    <p class="-mt-4 mb-5">Disponible</p>
                    <button class="transition duration-300 hover:bg-blue-700 bg-blue-800 text-white text-xs py-1 font-bold rounded-full px-3">Transférer des bits</button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
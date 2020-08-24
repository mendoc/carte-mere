<?php
// On signale qu'on utilisera les données de la session dans ce script
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Carte Mère</title>

    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <link href="../public/assets/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/style.css">

    <style>
        main {
            background-image: url(../public/assets/img/bg.jpg);
        }
    </style>
</head>

<body>
    <main class="h-screen bg-auto bg-bottom bg-scroll flex justify-end p-48">
        <div class="rounded-lg bg-white min-w-sm w-1/2 self-start">
            <div class="py-6 px-8">
                <span class="mb-10 block text-right font-bold text-blue-700">La Carte Mère</span>
                <form action="../traitements/connexion.php" method="post">
                    <div class="relative text-gray-700 border-gray-400 pb-1">
                        <svg class="absolute fill-current text-blue-700 w-4 inline mt-3 ml-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 292.146 292.146" style="enable-background:new 0 0 292.146 292.146;" xml:space="preserve">
                            <path d="M265.818,26.328c-35.103-35.104-92.017-35.104-127.12,0c-23.7,23.7-31.374,57.337-23.073,87.496L7.057,222.391 c-2.456,2.456-3.933,5.725-4.152,9.19l-2.876,45.386c-0.259,4.093,1.253,8.098,4.152,10.997c2.899,2.899,6.905,4.412,10.997,4.152 l45.386-2.876c3.466-0.22,6.734-1.696,9.19-4.153l7.651-7.65c3.987-3.987,5.672-9.727,4.473-15.237l-3.859-17.735 c-0.259-1.191,0.105-2.432,0.967-3.294c0.862-0.862,2.103-1.227,3.294-0.967l17.735,3.86c5.509,1.199,11.249-0.486,15.236-4.473 c3.987-3.987,5.672-9.727,4.473-15.236l-3.859-17.734c-0.259-1.191,0.105-2.432,0.967-3.294c0.862-0.862,2.103-1.227,3.294-0.967 l17.735,3.86c5.509,1.199,11.249-0.486,15.236-4.473l25.224-25.224c30.16,8.303,63.797,0.628,87.497-23.072 C300.922,118.346,300.922,61.431,265.818,26.328z M119.566,166.925l-71.771,71.771c-1.953,1.952-4.512,2.929-7.071,2.929 s-5.118-0.977-7.071-2.929c-3.905-3.905-3.905-10.237,0-14.142l71.771-71.771c3.906-3.904,10.236-3.904,14.143,0 C123.471,156.687,123.471,163.019,119.566,166.925z M228.122,115.752c-14.284,14.284-37.445,14.284-51.729,0 c-14.283-14.282-14.283-37.443,0.002-51.728c14.282-14.283,37.443-14.283,51.726,0C242.405,78.308,242.405,101.47,228.122,115.752z" /></svg>
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 pl-8 text-gray-700 leading-tight focus:outline-none focus:border-blue-700" name="_jeton_" placeholder="Entrez votre jeton" required type="password">
                    </div>
                    <input class="rounded w-full mt-4 py-2 cursor-pointer text-white bg-blue-700 hover:bg-blue-600" type="submit" value="Accéder">
                </form>
                <?php if (isset($_SESSION["message"])) : ?>
                    <div class="mt-3 px-2 py-4 rounded bg-red-200 text-center"><span class="font-bold text-red-800"><?= $_SESSION['message'] ?></span></div>
                <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

</body>

</html>
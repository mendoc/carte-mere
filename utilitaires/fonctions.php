<?php
function creer($collection, $data, $config)
{
    $fields = array("collection" => $collection, "data" => $data, "config" => $config);
    
    $url = 'https://badol-functions.netlify.app/.netlify/functions/donnees';

    requete($url, $fields);
}

function requete($url, $fields)
{
    
    $fields = json_encode($fields);
   
    $headers = array(
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $resultat = curl_exec($ch);

    curl_close($ch);

    return $resultat;
}
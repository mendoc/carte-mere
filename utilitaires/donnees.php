<?php
require_once 'debug.php';

class Donnees
{

    private static $baseUrl = "https://carte-mere.netlify.app/.netlify/functions";

    public static function get(array $params)
    {
        $url = Donnees::$baseUrl . "/get";

        $res =  Donnees::requete($url, $params);

        $res = json_decode($res, true);

        if (isset($res['error']) and $res['error'] == true) {
            return [];
        }

        return $res['data'];
    }

    public static function add(array $params)
    {
        $url = Donnees::$baseUrl . "/add";

        $res =  Donnees::requete($url, $params);

        return json_decode($res, true);
    }

    /**
     * Send an request to devices
     * @param String $url Endpoint for database function handler
     * @param String $fields Fields to send
     */
    public static function requete($url, array $fields)
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

        /*$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($status != 200) {
        	die("Error: call to URL $url failed with status $status, response $resultat, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch));
        }*/

        curl_close($ch);

        return $resultat;
    }
}

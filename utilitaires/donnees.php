<?php
require_once 'debug.php';

class Donnees
{

    private $configFile;
    private $baseUrl = "https://carte-mere.netlify.app/.netlify/functions";

    public function get(Array $params)
    {
        $url = $this->baseUrl . "/get";

        $docs = $this->requete($url, $params);

        //header('Content-Type: application/json');
        $docs = json_decode($docs, true);

        return $docs;
    }

    /**
     * Send an request to devices
     * @param String $url Endpoint for database function handler
     * @param String $fields Fields to send
     */
    function requete(String $url, Array $fields)
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

<?php

class Donnees
{

    private $configFile;

    public static function config($configFile)
    {
        if (file_exists($configFile)) {
            $donnees = new Donnees();
            $donnees->setConfig($configFile);
            return $donnees;
        } else {
            die("Le fichier de configuration est introuvable.");
        }
    }

    public function setConfig(String $configFile)
    {
        $this->configFile = $configFile;
    }
}

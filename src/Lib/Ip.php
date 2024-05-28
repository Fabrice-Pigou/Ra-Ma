<?php
namespace App\Lib;

/**
 * Class Ip
 * Permet de récupérer l'adresse ip d'un visiteur
 */
class Ip
{
    /**
     * @return string|null
     */
    public function GetIp(): ? string
    {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
    
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    
        // Sinon : IP normale
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }
}
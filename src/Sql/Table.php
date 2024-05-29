<?php
namespace App\Sql;

use \PDO;

/**
 * Class Table
 * Permet de se connecter à la BDD
 */
class Table {

    protected $pdo = NULL;

    protected $host     = 'localhost';
    protected $dbname   = 'rama';
    protected $login    = 'root';
    protected $password = '';

    public function __construct() {
        if($this->pdo === null) $this->pdo = $this->getPDO();
    }

    public function GetPDO(): PDO
    {
        $pdo = new PDO('mysql:host='. $this->host .'; dbname='. $this->dbname .'; charset=utf8', $this->login, $this->password);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       // Affiche les erreurs
        // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);               // Pour utiliser ? dans les LIMIT
        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);    // Retourne le résultat sous forme d'objet

        return $pdo;
    }

}
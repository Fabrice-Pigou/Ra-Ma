<?php
namespace App\Tables;

use \PDO;

abstract class Table {

	protected $pdo = NULL;

	protected $host = 'localhost';
	protected $dbname = 'goupy';
	protected $login = 'goupy';
	protected $password = 'goupy';
	
	public function __construct() {
		if($this->pdo === null) $this->pdo = $this->getPDO();
	}

	public function getPDO(): PDO
	{
		$pdo = new PDO('mysql:host='. $this->host .'; dbname='. $this->dbname .'; charset=utf8', $this->login, $this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		// Affiche les erreurs
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);	// Retourne le résultat sous forme d'objet
		$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE);				// Pour utiliser ? avec LIMIT

		return $pdo;
	}

}
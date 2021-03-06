<?php
namespace App\Tables;

use \PDO;

abstract class Table {

	protected $pdo = NULL;

	// private $host = 'localhost';
	// private $dbname = 'goupy';
	// private $login = 'goupy';
	// private $password = 'goupy';
	
	protected $host = 'goupyeuqqaho7vu.mysql.db';
	protected $dbname = 'goupyeuqqaho7vu';
	protected $login = 'goupyeuqqaho7vu';
	protected $password = '3PgJbB7c3Vjj';
	
	public function __construct() {
		if($this->pdo === null) $this->pdo = $this->getPDO();
	}

	public function getPDO(): PDO
	{
		$pdo = new PDO('mysql:host='. $this->host .'; dbname='. $this->dbname .'; charset=utf8', $this->login, $this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE); // Pour utiliser ? dans les LIMIT
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Retourne le résultat sous forme d'objet

		return $pdo;
	}

}
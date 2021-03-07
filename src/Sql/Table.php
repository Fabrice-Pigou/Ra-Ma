<?php
namespace App\Sql;

use \PDO;

class Table {

	protected $pdo = NULL;

	private $host = 'localhost';
	private $dbname = 'money';
	private $login = 'goupy';
	private $password = 'goupy';

	// protected $host = 'localhost';
	// protected $dbname = 'money_zapto';
	// protected $login = 'goupy';
	// protected $password = 'Hm1Bz19klmT2';
	
	public function __construct() {
		if($this->pdo === null) $this->pdo = $this->getPDO();
	}

	public function GetPDO(): PDO
	{
		$pdo = new PDO('mysql:host='. $this->host .'; dbname='. $this->dbname .'; charset=utf8', $this->login, $this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE); // Pour utiliser ? dans les LIMIT
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Retourne le résultat sous forme d'objet

		return $pdo;
	}

}
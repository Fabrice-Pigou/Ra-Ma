<?php
ini_set('display_errors',1);

require_once '../vendor/autoload.php';
use  App\Connection;
$oPdo = new Connection;

$pdo = $oPdo->getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE liste_cash');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$faker = Faker\Factory::create('fr_FR');

for ($i = 0; $i < 1500; $i++) {
	$term = rand(2012,2020) .'-'. sprintf('%1$02d', rand(1,12)) .'-'. sprintf('%1$02d', rand(1,28));
	$shop = rand(0,5);
	$spent = rand(1,34) .'.'. rand(0,99);
	
	$req = $pdo->prepare("
	INSERT INTO liste_cash (term, shop, spent)
	VALUES(:term, :shop, :spent)
	");
	$req->execute([
		'term'	=> $term,
		'shop'	=> $shop,
		'spent'	=> $spent
	]);
}

echo 'Ca marche';
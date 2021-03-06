<?php
session_start();
ini_set('display_errors',1);
require '../vendor/autoload.php';

$router = new App\Router(ROOT .'/controllers', ROOT);

$router
	//	Home page
	// 'URL' 'Chemin a partier du dossier controllers' 'Nom de la route'
	->get('/', 'home', 'home')

	->run();
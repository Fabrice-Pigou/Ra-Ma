<?php
session_start();
ini_set('display_errors',1);
require '../vendor/autoload.php';

$router = new App\Router(ROOT .'/controllers', ROOT);

$router
	// 'URL' 'Chemin a partier du dossier controllers' 'Nom de la route'

	/*-------------------------------------*\
		HOME PAGE
	\*-------------------------------------*/
	->match('/', 'home', 'home')

	/*-------------------------------------*\
		EXEMPLE
	\*-------------------------------------*/
	->match('/fixed/[update|delete:action]?/[i:id]?', 'fixed', 'fixed')

	/*---------------------------------------------------------------------------*\
		DEFAULT
	\*---------------------------------------------------------------------------*/
	->get('*', 'default', 'default')

	->run();
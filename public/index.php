<?php
session_start();
//    Active l'affichage des erreurs
ini_set('display_errors',1);

//    Supprime la mise en cache du css...
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

//    Appel l'autoloader
require '../vendor/autoload.php';

//    Initialise le routeur
$router = new App\Router(ROOT .'/controllers', ROOT);

$router
    // 'URL' 'Chemin à partir du dossier controllers' 'Nom de la route'

    /*-------------------------------------*\
        HOME PAGE
    \*-------------------------------------*/
    ->get('/', 'home', 'home')

    /*-------------------------------------*\
        EXEMPLE
    \*-------------------------------------*/
    ->match('/fixed/[update|delete:action]?/[i:id]?', 'fixed', 'fixed')

    /*---------------------------------------------------------------------------*\
        DEFAULT
    \*---------------------------------------------------------------------------*/
    ->get('*', 'home', 'default')

    ->run();

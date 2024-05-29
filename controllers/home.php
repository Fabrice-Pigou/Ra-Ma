<?php
use App\Sessions\Modal;
// Modal::SetModal('Merde a celui qui le lira');

/*------------------------------------------------------------------------*\
            GESTION DES GET
\*------------------------------------------------------------------------*/
if(isset($params) && $params != null){
    var_dump($params);
}

/*------------------------------------------------------------------------*\
            GESTION DES POST
\*------------------------------------------------------------------------*/
if (isset($_POST) && $_POST != null) {
    var_dump($_POST);
}

/*------------------------------------------------------------------------*\
            VARIABLES POUR TWIG
\*------------------------------------------------------------------------*/
echo $twig->render('home.html.twig', [
    'page'          => 'home',
    'description'   => '',
    'title'         => 'Cartes mémoire | '. NAME,
    'name'          => NAME,
    'slogan'        => SLOGAN,
    'session'       => $_SESSION,

    'modal'         => Modal::Modal()
]);
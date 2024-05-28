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
    'description'   => 'Bienvenue sur la page des flashcards de notre plateforme de e-learning ! Ici, vous trouverez un outil puissant pour améliorer votre apprentissage et renforcer vos connaissances de manière interactive.',
    'title'         => 'Cartes mémoire | '. NAME,
    'name'          => NAME,
    'slogan'        => SLOGAN,
    'session'       => $_SESSION,

    'modal'         => Modal::Modal()
]);
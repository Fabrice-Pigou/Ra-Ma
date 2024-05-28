<?php
use App\Sessions\Modal;
$page = 'home';

/*------------------------------------------------------------------------*\
            GESTION DES POST
\*------------------------------------------------------------------------*/
if (isset($_POST) && $_POST != null) {
    //    var_dump($_POST);
}

/*------------------------------------------------------------------------*\
            GESTION DES GET
\*------------------------------------------------------------------------*/
if(isset($params) && $params != null){
    //    var_dump($params);
}

/*------------------------------------------------------------------------*\
            VARIABLES POUR TWIG
\*------------------------------------------------------------------------*/
echo $twig->render($page . '.html.twig', [
    'page'          => $page,
    'description'   => 'Bienvenue sur la page des flashcards de notre plateforme de e-learning ! Ici, vous trouverez un outil puissant pour améliorer votre apprentissage et renforcer vos connaissances de manière interactive.',
    'title'         => 'Cartes mémoire | '. NAME,
    'name'          => NAME,
    'slogan'        => SLOGAN,
    'session'       => $_SESSION,

    'modal'         => Modal::Modal()
]);
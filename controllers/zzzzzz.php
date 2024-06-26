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
    'description'   => '',
    'title'         => ' | '. NAME,
    'name'          => NAME,
    'slogan'        => SLOGAN,
    'session'       => $_SESSION,

    'modal'         => Modal::Modal()
]);
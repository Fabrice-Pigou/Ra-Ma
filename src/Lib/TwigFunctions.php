<?php
namespace App\Lib;

/**
 * Class TwigFunction
 * Function pour twig
 */
class TwigFunctions
{
    /**
    *   Fonction pour afficher les liens du site
    *   Si le membre est connecter et selon son grade
    * 
    *   @param string   $link    l'adresse uri
    *   @param string   $title    le titre à afficher du lien
    *   @param int      $login    si le membre doit être connecté 
    *                   0 -> affiche le lien que si le membre est déconnecté
    *                   1 -> affiche le lien que si le membre est connecté
    *                   null (Par défaut) lien toujours affiché
    *   @param int      $rank    grade minimum pour afficher le lien
    */
    public function GetNavLink(string $link, string $title, ? int $login = null, int $rank = 0): ? string
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $css = 'nav-link px-3';
        //    Ajout 'active' au CSS si c'est la page courante
        if($link === $uri[1]) $css .= ' active';
        $return = '<li class="nav-item"><a    class="' . $css . '" href="/' . $link . '">' . $title . '</a></li>';
        
        if($login !== null) {
            //    Si le membre est connecté
            if (isset($_SESSION['user']) ) {
                //    Le membre ne doit pas être connecté pour voir le lien
                if($login === 0) return null;
                //    Grade inferieur au grade autorisé
                if (isset($_SESSION['user']['rank']) && $_SESSION['user']['rank'] < $rank) return null;
            }
            //    Le membre n'est pas connecté
            else {
                //    Le membre doit être connecté pour voir le lien
                if ($login === 1) return null;
            }
        }

        return $return;
    }
}
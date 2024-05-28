<?php 
namespace App\Forms;

use App\Lib\Text;

/**
 * Class Form
 * Permet de construire un formulaire
 */
class Form extends Fields
{
    /**
     * @var string $oText
     */
    private $oText;
    
    /*------------------------------------------------------------------------*\
            CONSTRUCTEUR
    \*------------------------------------------------------------------------*/
    public function __construct(int $month = null, int $year = null)
    {
        if ($this->oText === null)    $this->oText = new Text;
    }

    /*----------------------------------------------------------------------------*\
            MOUVEMENT FIXES
    \*----------------------------------------------------------------------------*/
    /**
     * FormDef
     *
     * @return array
     */
    public function FormDef(){
        
        $return[] = $this->Input('provider', 'Qui', 'xl', 6);
        $return[] = $this->Input('lapin', 'Lapin', 'xl', 6);
        $return[] = $this->Hidden('id');
        $return[] = $this->Submit();

        return $return;
    }

}
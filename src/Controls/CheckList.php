<?php
namespace App\Controls;

use App\Sessions\Modal;

/**
 * Class CheckList 
 * Permet de vérifier si les info entrés dans un formulaire correspondent à ce qui est attendu
 */
class CheckList extends Checking
{
    /**
     * Vérification des champs du formulaire
     * 
     * @param array $data
     * 
     * @return bool
     */
    public function CheckingForm(array $data):bool
    {
        $i = 0;
        //    Champs 'provider'
        if ($this->EmptyField($data['provider'], 'Chez qui ?')) $i ++;
        //    Champs 'day'
        if ($this->SelectField($data['day'], 'Quel jour ?')) $i ++;
        //    Champs 'family'
        if ($this->SelectField($data['family'], 'Quelle famille ?')) $i ++;
        //    Le champs 'amount'
        if ($this->EmptyField($data['amount'], 'Quelle montant ?')) $i ++;

        if ($i === 0) return true;

        return false;
    }

}
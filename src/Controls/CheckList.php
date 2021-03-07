<?php
namespace App\Controls;

use App\Sessions\Modal;

class CheckList extends Checking
{
	public function CheckingEntries($data)
	{
		$i = 0;
		//	Champs 'term'
		if ($this->EmptyField($data['term'], 'Si tu met pas de date ca sert à rien')) $i ++;
		if ($this->NotDate($data['term'], 'Le format de la date n\'est pas bon')) $i ++;

		if ($i === 0) return true;
		
		return false;
	}

	/**
	 * Vérification des champs du formulaire des mouvements fixe
	 * @param array $data
	 * @return bool
	 */
	public function CheckingFixed(array $data):bool
	{
		$i = 0;
		//	Champs 'provider'
		if ($this->EmptyField($data['provider'], 'Chez qui ?')) $i ++;
		//	Champs 'day'
		if ($this->SelectField($data['day'], 'Quel jour ?')) $i ++;
		//	Champs 'family'
		if ($this->SelectField($data['family'], 'Quelle famille ?')) $i ++;
		//	Le champs 'amount'
		if ($this->EmptyField($data['amount'], 'Quelle montant ?')) $i ++;
		
		if ($i === 0) return true;
		
		return false;
	}

	/**
	 * Vérification des champs du formulaire de ENVELOPES
	 * @param array $data
	 * @return bool
	 */
	public function CheckingEnvelopes(array $data):bool
	{
		$i = 0;
		//	Champs 'name'
		if ($this->EmptyField($data['name'], 'Quel nom ?')) $i ++;
		//	Champs 'taux' et 'value' vide
		if ($this->LeastOne($data['rate'], $data['value'], 'Faut remplir le taux ou la valeur ou les deux !!')) $i ++;
		
		if ($i === 0) return true;
		
		return false;
	}
}
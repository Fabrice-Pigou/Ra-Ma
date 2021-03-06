<?php
namespace App\Controls;
use App\Sessions\Flash;

class Checking extends Check
{
	public function CheckingCash($data)
	{
		$i = 0;
		if ($this->EmptyField($data['term'], 'Il faut choisir une date')) $i ++;
		if ($this->NotDate($data['term'])) $i ++;
		if ($this->SelectField($data['shop'], 'Il faut choisir un magasin')) $i ++;
		if ($this->NotNumber($data['shop'], 'Faut pas toucher au formulaire!!!')) $i ++;
		if ($this->EmptyField($data['spent'], 'Combien ça à couté ?')) $i ++;
		if ($this->NotNumber($data['spent'], 'Il faut entré un nombre')) $i ++;
		
		return $i;
	}

}
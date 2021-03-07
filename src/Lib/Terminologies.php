<?php 
namespace App\Lib;

class Terminologies
{
	private $aFamilies = ['Dépenses fixes', 'Epargne', 'Revenus'];
		
	/**
	 * Retourne une famille de dépense
	 * @param int $k
	 * @return string
	 */
	public function GetFamily($k):string
	{
		return $this->aFamilies[$k];
	}
	
	/**
	 * Retourne toutes les famille de dépense par l'ordre alphabétique
	 * @return array
	 */
	public function GetFamilies():array
	{
		asort($this->aFamilies);
		return $this->aFamilies;
	}

}
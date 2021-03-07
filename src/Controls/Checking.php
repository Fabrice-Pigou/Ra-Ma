<?php
namespace App\Controls;

use App\Sessions\Modal;

class Checking{

	/**
	 * Vérifie si un champs est vide
	 *
	 * @param  mixed $value
	 * @param  string $message
	 *
	 * @return bool
	 */
	public function EmptyField($value, $message) {
		if ($value === '0') return false;
		elseif(empty($value)){
			Modal::setModal($message);
			return true;
		}
		else return false;
	}

	/**
	 * Vérification d'un champ select ($value != 99)
	 *
	 * @param  int $value
	 * @param  string $message
	 *
	 * @return bool
	 */
	public function SelectField($value, $message) :bool {
		if($value == 99) {
			Modal::setModal($message);
			return true;
		}
		else return false;
	}

	/**
	 * Vérifie si il y à des catégories lié à une sous catégorie
	 *
	 * @param  string $data
	 * @param  mixed $message
	 *
	 * @return bool
	 */
	public function NoCategories($data, $message) {
		if(count($data) < 3){
			Modal::setModal($message);
			return true;
		}
		else return false;
	}

	/**
	 * Vérification du format d'une date (xxxx-xx-xx)
	 * 
	 * @param  date $date
	 * 
	 * @return bool
	 */
	function NotDate($date) {
		if (!preg_match("#^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$#", $date)) {
			Modal::setModal('Le format de la date n\'est pas valide (jj/mm/aaaa)');
			return true;
		}
		return false;
	}

	/**
	 * Vérifie que la valeur est un nombre
	 * 
	 * @param  $value
	 * @param  $message
	 * 
	 * @return bool
	 */
	function NotNumber($value, $message) {
		if (!empty($value)) {
			if (!preg_match("#^[0-9]+\.?[0-9]*$#", $value)) {
				Modal::setModal($message);
				return true;
			}
		}
		return false;
	}

	/**
	 * Vérifie si 2 champs son remplis
	 * 
	 * @param  $value1
	 * @param  $value2
	 * @param  $message
	 * 
	 * @return bool
	 */
	function Both($value1, $value2, $message):bool
	{
		if ($value1 && $value2) {
			Modal::setModal($message);
			return true;
		}
		return false;
	}

	/**
	 * Vérifie si 2 champs son vide
	 * 
	 * @param  $value1
	 * @param  $value2
	 * @param  $message
	 * 
	 * @return bool
	 */
	function LeastOne($value1, $value2, $message):bool
	{
		if ($value1 == null && $value2 == null) {
			Modal::setModal($message);
			return true;
		}
		return false;
	}

}

<?php
namespace App\Controls;
use App\Sessions\Flash;

class Check{

	/**
	 * Vérifie si un champs est vide
	 *
	 * @param  string $name
	 * @param  mixed $value
	 *
	 * @return bool
	 */
	public function EmptyField($value, $message) {
		if(empty($value)){
			Flash::setFlash($message, 'danger');
			return true;
		}
		else return false;
	}

	/**
	 * Vérification d'un champ select ($value != 99)
	 *
	 * @param  string $name
	 * @param  int $value
	 *
	 * @return bool
	 */
	public function SelectField($value, $message) :bool {
		if($value == 99) {
			Flash::setFlash($message, 'danger');
			return true;
		}
		else return false;
	}

	/**
	 * Vérification du format d'une date (xxxx-xx-xx)
	 * @param  date $date
	 * @return bool
	 */
	function NotDate($date) {
		if (!preg_match("#^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$#", $date)) {
			Flash::setFlash('Le format de la date n\'est pas valide (jj/mm/aaaa)', 'danger');
			return true;
		}
		return false;
	}

	/**
	 * Vérifie que la valeur est un nombre
	 * @param  $value
	 * @return bool
	 */
	function NotNumber($value, $message) {
		if (!empty($value)) {
			if (!preg_match("#^[0-9]+\.?[0-9]*$#", $value)) {
				Flash::setFlash($message, 'danger');
				return true;
			}
		}
		return false;
	}

}

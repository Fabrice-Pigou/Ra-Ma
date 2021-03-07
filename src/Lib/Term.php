<?php 
namespace App\Lib;

use App\Sql\Entries;

class Term
{
	private $aMonths = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	private $oEntries;

	public function __construct() {
		if ($this->oEntries === null)	$this->oEntries = new Entries;
	}
	
	/*------------------------------------------------------------------------*\
			Mois
	\*------------------------------------------------------------------------*/
	/**
	 * Retourne le nom du mois suivant et l'année
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetNextMonthName(int $year, int $month):string
	{
		$month ++;
		if ($month > 12 ) {
			$month = 1;
			$year += 1;
		}
		return $this->aMonths[$month -1] .' '. $year;
	}
	/**
	 * Retourne le mois suivant pour l'url
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetNextMonth(int $year, int $month):string
	{
		$month ++;
		if ($month > 12 ) {
			$month = 1;
			$year += 1;
		}
		return $year .'/'. $month;
	}
	/**
	 * Retourne le mois suivant pour l'url
	 * 		Si il y a des écritures pour ce mois
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetNextMonthLink(int $year,int $month):string
	{
		$month ++;
		if ($month > 12 ) {
			$month = 1;
			$year += 1;
		}

		$p = $this->oEntries->GetIfMonthEntries($year,$month);
		if ($p) return $year .'/'. $month;
		else return false;
	}

	/**
	 * Retourne le nom du mois précédent et l'année
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetLastMonthName(int $year, int $month):string
	{
		$month --;
		if ($month < 1 ) {
			$month = 12;
			$year -= 1;
		}
		return $this->aMonths[$month -1] .' '. $year;
	}
	/**
	 * Retourne le mois précédent pour l'url
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetLastMonth(int $year, int $month):string
	{
		$month --;
		if ($month < 1 ) {
			$month = 12;
			$year -= 1;
		}
		return $year .'/'. $month;
	}
	/**
	 * Retourne le mois précédent pour l'url
	 * 		Si il y a des écritures pour ce mois
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetLastMonthLink(int $year, int $month)
	{
		$month --;
		if ($month < 1 ) {
			$month = 12;
			$year -= 1;
		}
		$p = $this->oEntries->GetIfMonthEntries($year,$month);
		if ($p) return $year .'/'. $month;
		else return false;
	}

	/**
	 * Retourne le nom du mois
	 * 
	 * @param int $month
	 * @return string
	 */
	public function GetMonthName(int $month):string
	{
		if ($month <= 0 || $month > 12) {
			header('location:/');
			exit();
		}
		return $this->aMonths[$month -1];
	}
		
	/**
	 * GetDateMonth
	 *
	 * @param  int $year
	 * @param  int $month
	 * @return string
	 */
	public function GetDateMonth(int $year,int $month):string
	{
		$month --;
		return $this->aMonths[$month] .' '. $year;
	}

}
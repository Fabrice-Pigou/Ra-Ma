<?php 
namespace App\Lib;

class Term
{
    /**
     * @var array $aMonths    Le nom des mois
     */
    private $aMonths = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    /**
     * @var array $aMonths    Le nom des mois version court
     */
    private $aMonthsLight = ['Jan.', 'Fév.', 'Mar', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'];

    public function __construct() {
        
    }
    
    /*------------------------------------------------------------------------*\
            Mois
    \*------------------------------------------------------------------------*/
    /**
     * Retourne le nom du mois suivant et l'année
     * 
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetNextMonthName(int $year, int $month): string
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
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetNextMonth(int $year, int $month): string
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
     *         Si il y a des écritures pour ce mois
     * 
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetNextMonthLink(int $year,int $month): string
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
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetLastMonthName(int $year, int $month): string
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
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetLastMonth(int $year, int $month): string
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
     *         Si il y a des écritures pour ce mois
     * 
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetLastMonthLink(int $year, int $month): ? string
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
     * @param int $year
     * @param int $month
     * 
     * @return string
     */
    public function GetMonthName(int $month): string
    {
        if ($month <= 0 || $month > 12) {
            header('location:/');
            exit();
        }
        return $this->aMonths[$month -1];
    }
        
    /**
     * GetDateMonth 
     * Retourne le mois et l'année au format long(Ex: Novembre 1972)
     *
     * @param  int $year
     * @param  int $month
     * 
     * @return string
     */
    public function GetDateMonth(int $year,int $month):string
    {
        $month --;
        return $this->aMonths[$month] .' '. $year;
    }

    /**
     * GetDateShort
     * Retourn la date version courte (Ex: Nov. 1972)
     *
     * @param  string $date
     * 
     * @return string
     */
    public function GetDateShort(? string $date): ? string
    {
        if ($date == null) return null;
        
        $date = explode('-', $date);
        $month = $date[1] -1;
        $month = sprintf('%1$00d', $month);
        if ($date[0] < \date('Y')) {
            return $this->aMonthsLight[$month] .' '. $date[0];
        }
        if (strlen($date[2]) > 2) {
            $date[2] = explode(' ', $date[2])[0];
        }
        return intval($date[2]) .' '. $this->aMonthsLight[$month];
    }

    /**
     * Retourn une date au complet(ex: le 10 Novembre 1972)
     *
     * @param  string $date
     * 
     * @return string
     */
    public function GetDateForNews(string $date): string
    {
        $date = explode('-', $date);
        $month = $date[1] -1;
        $month = sprintf('%1$00d', $month);
        
        return 'le '. $date[2] .' '. $this->aMonths[$month] .' '. $date[0];
    }

}
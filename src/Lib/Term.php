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


    /**
     * Retourne le nom du mois au format long (Ex: Novembre)
     * 
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
     * Retourne le nom du mois au format court (Ex: Nov.)
     * 
     * @param int $month
     * 
     * @return string
     */
    public function GetMonthNameShort(int $month): string
    {
        if ($month <= 0 || $month > 12) {
            header('location:/');
            exit();
        }
        return $this->aMonths[$month -1];
    }

    /**
     * GetYearMonth
     * Retourne le mois et l'année au format long (Ex: Novembre 1972)
     * 
     * @param  string $date
     * 
     * @return string
     */
    public function GetYearMonth(?string $date): ? string
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
        return intval($date[2]) .' '. $this->aMonths[$month];
    }

    /**
     * GetYearMonthShort
     * Retourn la date version courte (Ex: Nov. 1972)
     *
     * @param  string $date
     * 
     * @return string
     */
    public function GetYearMonthShort(?string $date): ? string
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
     * Retourn une date au complet (ex: le 10 Novembre 1972)
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
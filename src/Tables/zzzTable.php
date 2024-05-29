<?php

namespace App\Tables;

use App\Sessions\Modal;

class TableFixed
{
    private $oEntries;
    private $aFixed;
    public $month;
    public $year;

    public function __construct(int $year = null, int $month = null)
    {
        $this->year = ($year === null ? intval(date('Y')) : $year);
        $this->month = ($month === null ? intval(date('m')) : $month);

        if ($this->aFixed === null)         $this->aFixed = $this->oEntries->GetMonthFixed();
    }

    /**
     * AllFixed
     * Tableau pour lister tous les mouvements fixe
     * 
     * @return Array
     */
    public function AllFixed(): array
    {
        $aFixed = [];
        $return[] = '<tbody>';

        foreach ($aFixed as $fix) {
            $return[] .= '<tr class="">';
            $return[] .= '<td class="">' . sprintf('%1$02d', $fix->day) . '</td>';
            $return[] .= '<td class="pl-4 w-50">' . $fix->provider . '</td>';
            $return[] .= '<td class="pr-4 text-right">' . number_format($fix->amount, 2, ',', '') . '</td>';
            $return[] .= '<td class=""><a class="text-info" href="/fixed/update/' . $fix->id . '"><i class="far fa-edit"></i></a></td>';
            $return[] .= '<td class=""><a class="text-danger" href="/fixed/delete/' . $fix->id . '" onclick="return confirm(\'Atention!!! \nÇa va être supprime définitivement!\')"><i class="far fa-trash-alt"></i></a></td>';
            $return[] .= '</tr>';
        }
        $return[] .= '</tbody>';

        return $return;
    }
}

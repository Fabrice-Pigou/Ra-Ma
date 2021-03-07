<?php

namespace App\Tables;

use App\Sessions\Modal;
use App\Sql\{Entries, Fixed};
use App\Lib\Terminologies;

class TableFixed
{
	private $oTerminologies;
	private $oEntries;
	private $oFixed;
	private $aFixed;
	public $month;
	public $year;

	public function __construct(int $year = null, int $month = null)
	{
		$this->year = ($year === null ? intval(date('Y')) : $year);
		$this->month = ($month === null ? intval(date('m')) : $month);

		if ($this->oEntries === null)			$this->oEntries = new Entries($this->year, $this->month);
		if ($this->aFixed === null)				$this->aFixed = $this->oEntries->GetMonthFixed();
		if ($this->oTerminologies === null)		$this->oTerminologies = new Terminologies;
		if ($this->oFixed === null)				$this->oFixed = new Fixed;
	}

	/**
	 * Tableau Pour lister les mouvements fixe selon la famille
	 *
	 * @param  int $family
	 * @return array
	 */
	public function FixedMovements(int $family): array
	{
		$total = 0;
		$return[] = '<tbody>';

		foreach ($this->aFixed as $fix) {
			if ($fix->family == $family) {
				$total += $fix->amount;
				$return[] .= '<tr class="">';
				$return[] .= '<td class="pr-3">Le ' . sprintf('%1$02d', $fix->day) . '</td>';
				$return[] .= '<td class="w-50">' . $fix->provider . '</td>';
				$return[] .= '<td class="pr-2 text-right">' . number_format($fix->amount, 2, ',', '') . '</td>';
				$return[] .= '<td class=""><a class="text-info" href="/entries/update/' . $fix->id . '"><i class="far fa-edit"></i></a></td>';
				$return[] .= '<td class=""><a class="text-danger" href="/entries/delete/' . $fix->id . '" onclick="return confirm(\'Atention!!! \nÇa va être supprime définitivement!\')"><i class="far fa-trash-alt"></i></a></td>';
				$return[] .= '</tr>';
			}
		}
		$return[] .= '</tbody>';

		$return[] .= '<tfoot>';
		$return[] .= '<tr class="h4 table-info">';
		$return[] .= '<td></td>';
		$return[] .= '<td class="w-50">TOTAL</td>';
		$return[] .= '<td class="pr-2 text-right font-weight-bold text-success">' . number_format($total, 2, ',', '') . '</td>';
		$return[] .= '<td colspan="2"></td>';
		$return[] .= '</tr>';
		$return[] .= '</tfoot>';

		return $return;
	}

	/**
	 * Tableau Pour lister tous les mouvements fixe
	 * @return Array
	 */
	public function AllFixed()
	{
		$aFixed = $this->oFixed->GetAllByDay();
		$return[] = '<tbody>';

		foreach ($aFixed as $fix) {
			$return[] .= '<tr class="">';
			$return[] .= '<td class="">' . sprintf('%1$02d', $fix->day) . '</td>';
			$return[] .= '<td class="pl-4 w-50">' . $fix->provider . '</td>';
			$return[] .= '<td class="w-50">' . $this->oTerminologies->GetFamily($fix->family) . '</td>';
			$return[] .= '<td class="pr-4 text-right">' . number_format($fix->amount, 2, ',', '') . '</td>';
			$return[] .= '<td class=""><a class="text-info" href="/fixed/update/' . $fix->id . '"><i class="far fa-edit"></i></a></td>';
			$return[] .= '<td class=""><a class="text-danger" href="/fixed/delete/' . $fix->id . '" onclick="return confirm(\'Atention!!! \nÇa va être supprime définitivement!\')"><i class="far fa-trash-alt"></i></a></td>';
			$return[] .= '</tr>';
		}
		$return[] .= '</tbody>';

		return $return;
	}
}

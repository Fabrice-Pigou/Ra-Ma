<?php 
namespace App\Html;

use App\Tables\Articles;
use App\Lib\Categories;
use App\Lib\Unit;
use App\Lib\Shop;
use App\Html\Form;

class Fields
{
	private $oForm;
	private $oArticles;
	private $oCategories;
	private $oUnit;
	private $oShop;

	public function __construct()
	{
		if ($this->oForm === null) $this->oForm = new Form;
		if ($this->oArticles === null) $this->oArticles = new Articles;
		if ($this->oCategories === null) $this->oCategories = new Categories;
		if ($this->oUnit === null) $this->oUnit = new Unit;
		if ($this->oShop === null) $this->oShop = new Shop;
	}

	public function form() {

		$aFields[] = $this->oForm->Input('name', 'Nom de l\'article');
		$aFields[] = $this->oForm->Select('unit', 'Unité de mesure', $this->oUnit->getAll());
		$aFields[] = $this->oForm->Select('category', 'Rayon', $this->oCategories->getAll());
		$aFields[] = $this->oForm->Hidden('id');
		$aFields[] = $this->oForm->Submit();

		return $aFields;
	}

	public function FormCash(){
		$aFields[] = $this->oForm->Date('term', 'Jour');
		$aFields[] = $this->oForm->Select('shop', 'Magasin', $this->oShop->getAll());
		$aFields[] = $this->oForm->Float('spent', 'Dépense');
		$aFields[] = $this->oForm->Hidden('id');
		$aFields[] = $this->oForm->Submit();

		return $aFields;
	}

}
<?php 
namespace App\Forms;

class Fields
{	
	/**
	 * Champ Input
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * @param  string $required
	 * @param  string $value
	 * 
	 * @return string
	 */
	public function Input(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="text" name="'. $name .'" value="'. $value .'">';
		$return .= '</div>';
		
		return $return;
	}
	
	/**
	 * Textarea
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * @param  string $required
	 * @param  int $rows
	 * @param  string $value
	 * @return string
	 */
	public function Text(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', int $rows = 10, string $value = null):string
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<textarea class="form-control" id="'. $name .'" rows="'. $rows .'" name="'. $name .'">'. $value .'</textarea>';
		$return .= '</div>';

		return $return;
	}

	/**
	 * Champ date
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * @param  string $required
	 * @param  string $value
	 * 
	 * @return string
	 */
	public function Term(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		else $value = date('Y-m-d');
		
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="date" name="'. $name .'" value="'. $value .'" required>';
		$return .= '</div>';

		return $return;
	}

	/**
	 * Champ pour les jour d'un mois 1, 2, 3, 4, 5... 31
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * 
	 * @return string
	 */
	public function Day(string $name, string $label, string $size = 'sm', int $col = 12):string
	{
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<select class="form-control" id="'. $name .'" name="'. $name .'">';
		$return .= '<option value="null">Choisir...</option>';
		for ($k = 1; $k <= 31; $k++)
		{
			$selected = '';
			if (isset($_POST[$name]) AND $_POST[$name] == $k) $selected ='selected';
			$return .= '<option value="'. $k .'" '. $selected .'>'. $k .'</option>';
		}
		$return .= '</select>';
		$return .= '</div>';
		return $return;
	}

	/**
	 * Champ number
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * @param  string $required
	 * @param  string $value
	 * 
	 * @return string
	 */
	public function Number(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="number" name="'. $name .'" value="'. $value .'">';
		$return .= '</div>';

		return $return;
	}

	/**
	 * Champ float
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  string $size
	 * @param  int $col
	 * @param  string $required
	 * @param  string $value
	 * 
	 * @return string
	 */
	public function Float(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
	{
		if (isset($_POST[$name]) && $_POST[$name] != 0) $value = $_POST[$name];
		
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control texth-right" id="'. $name .'" type="float" name="'. $name .'" value="'. $value .'">';
		$return .= '</div>';

		return $return;
	}
	
	/**
	 * Champs Select
	 *
	 * @param  string $name
	 * @param  string $label
	 * @param  array $data
	 * @param  string $size
	 * @param  int $col
	 * @return void
	 */
	public function Select(string $name, string $label, array $data = [], string $size = 'sm', int $col = 12)
	{
		$return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<select class="form-control" id="'. $name .'" name="'. $name .'">';
		$return .= '<option value="null">Choisir...</option>';
		
		foreach ($data as $k => $n) {
			$selected = '';
			if (isset($_POST[$name]) AND $_POST[$name] == $k) $selected ='selected';
			$return .= '<option value="'. $k .'" '. $selected .'>'. $n->name .'</option>';
		}
		$return .= '</select>';
		$return .= '</div>';
		return $return;
	}

	public function Hidden($name, $value = 0)
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		return '<input type="hidden" name="'. $name .'" value="'. $value .'">';
	}

	public function Submit($value = 'Envoyer'):string
	{
		$return = '<div class="col-12 p-0">';
		$return .= '<button type="submit" class="btn btn-primary ml-3">'. $value .'</button>';
		$return .= '</div>';

		return $return;
	}

	// public function Checkbox(array $datas = [], $label, string $size = 'sm', int $col = 12)
	// {
	// 	$return = '<div>'. $label .'</div>';
	// 	$return .= '<div class="form-group form-check col-12 col-'. $size .'-'. $col .'">';
	// 	foreach ($datas as $data) {
	// 		$checked = '';
	// 		foreach ($connections as $value) if ($data->id == $value->category) $checked ='checked';

	// 		$return .= '<input class="" type="checkbox" name="'. $data->id .'" id="'. $data->id .'" '. $checked .'>';
	// 		$return .= '<label class="form-check-label pl-2" for="'. $data->id .'">'. $data->name .'</label>';
	// 	}
	// 	$return .= '</div>';
	// 	return $return;
	// }
}
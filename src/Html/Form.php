<?php 
namespace App\Html;

class Form
{
	public function Input($name, $label, $value = '')
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="text" name="'. $name .'" value="'. $value .'" required>';
		$return .= '</div>';

		return $return;
	}

	public function Date($name, $label, $value = '')
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		else $value = date('Y-m-d');
		
		$return = '<div class="form-group">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="date" name="'. $name .'" value="'. $value .'" required>';
		$return .= '</div>';

		return $return;
	}

	public function Number($name, $label, $value = '')
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="number" name="'. $name .'" value="'. $value .'" required>';
		$return .= '</div>';

		return $return;
	}

	public function Float($name, $label, $value = '')
	{
		if (isset($_POST[$name])) $value = $_POST[$name];
		
		$return = '<div class="form-group">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<input class="form-control" id="'. $name .'" type="float" name="'. $name .'" value="'. $value .'" required>';
		$return .= '</div>';

		return $return;
	}

	public function Select($name, $label, $data = [])
	{
		$return = '<div class="form-group">';
		$return .= '<label for="'. $name .'">'. $label .'</label>';
		$return .= '<select class="form-control" id="'. $name .'" name="'. $name .'">';
		$return .= '<option value="99">Choisir...</option>';
		
		foreach ($data as $k => $n) {
			$selected = '';
			if (isset($_POST[$name]) AND $_POST[$name] == $k) $selected ='selected';
			$return .= '<option value="'. $k .'" '. $selected .'>'. $n .'</option>';
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

	public function Submit($value = 'Envoyer')
	{
		return '<button type="submit" class="btn btn-primary">'. $value .'</button>';
	}

}
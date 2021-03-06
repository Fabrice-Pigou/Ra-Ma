<?php 
namespace App\Sessions;

class Flash {
	
	/**
	 * flash
	 *		Affiche le ou les messages flash
	 *
	 * @return string
	 */
	public static function flash() {
		if (isset($_SESSION['flash'])) {
			$return = '';
			foreach ($_SESSION['flash'] as $flash){
				$return .= '<div class="mt-4 shadow alert alert-'. $flash['type'] .' alert-dismissible fade show" role="alert">';
				$return .= $flash['message'];
				$return .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
				$return .= '<span aria-hidden="true">&times;</span>';
				$return .= '</button></div>';
			}

			unset($_SESSION['flash']);

			return $return;
		}
	}

	/**
	 * setFlash
	 *
	 * @param  string $message
	 * @param  string $type
	 */
	public static function setFlash(string $message, string $type = 'primary') {
		if (!isset($_SESSION['flash'])) $_SESSION['flash'] = [];

		$_SESSION['flash'][] = [
			'message' => $message,
			'type' => $type
		];
	}

}

// use App\Sessions\Flash;
// Flash::setFlash('la merde est déja utilisée', 'alert');
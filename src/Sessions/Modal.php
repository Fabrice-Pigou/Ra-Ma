<?php 
namespace App\Sessions;

class Modal {
	/**
	 * Modal
	 *		Affiche le ou les messages flash
	 *
	 * @return string
	 */
	public static function Modal() {
		if (isset($_SESSION['modal'])) {
			$return = '';
			

				$return .= '<div class="modal fade modal-open" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-show="true">';
				$return .= '<div class="modal-dialog" role="document">';
				$return .= '<div class="modal-content">';
				$return .= '<div class="modal-header">';
				$return .= '<h5 class="modal-title text-danger font-weight-bold">Message important</h5></div>';
				foreach ($_SESSION['modal'] as $modal){
					$return .= '<div class="modal-body h4 bold">';
					$return .= $modal['message'];
					$return .= '</div>';
				}
				$return .= '<div class="modal-footer">';
				$return .= '<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>';
				$return .= '</div></div></div></div>';

			unset($_SESSION['modal']);

			return $return;
		}
	}

	/**
	 * SetModal
	 *
	 * @param  string $message
	 */
	public static function SetModal(string $message) {
		if (!isset($_SESSION['modal'])) $_SESSION['modal'] = [];

		$_SESSION['modal'][] = ['message' => $message];
	}

}

// use App\Sessions\Modal;
// Modal::SetModal('Le message');
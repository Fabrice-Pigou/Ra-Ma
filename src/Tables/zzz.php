<?php
namespace App\Tables;

use App\Sessions\Flash;

class Articles extends Table
{
	private $pdo;

	/*----------------------------------------------------------------------------*\
			AJOUTER
	\*----------------------------------------------------------------------------*/
	public function addPatient($data = []){
		$req = $this->pdo->prepare("
			INSERT INTO patients (nom, email, phone)
			VALUES(:nom, :email, :phone)
		");
		$req->execute([
			'nom' => $data['nom'],
			'email' => $data['email'],
			'phone' => $data['phone']
		]);

		return $this->pdo->lastInsertId();
	}

	/*------------------------------------------------------------------------*\
			COMPTER
	\*------------------------------------------------------------------------*/
	public function countAll(){

		$req = $this->pdo->query('
			SELECT COUNT(*) AS nbr
			FROM patients
		');

		$data = $req->fetch();
		return $data['nbr'];
	}

	/*------------------------------------------------------------------------*\
			LIRE
	\*------------------------------------------------------------------------*/
	/**
	 * le nom du patient pour un email déjà utilisé
	 * @param  string $email l'adresse mail
	 * @return array        le nom et l'id
	 */
	public function getOne($id){

		$req = $this->pdo->prepare('
			SELECT article_title, article_text
			FROM note_articles
			WHERE article_id = ?
		');
		$req->execute([$id]);
		return $req->fetch();
	}

	public function getByCat($id){
		$req = $this->pdo->prepare('
		SELECT article_id, article_title, article_url
		FROM note_articles
		WHERE article_cat = ?
		ORDER BY article_title
		');
		$req->execute([$id]);
		return $req->fetchAll();
	}
	/**
	 * Récupère les 20 derniers articles
	 * @return array
	 */
	public function getLast(){
		$req = $this->pdo->query('
			SELECT article_id, article_title, article_url, category_name,
			DATE_FORMAT(creation_date, "%d/%m/%Y %Hh%imin%ss") AS date
			FROM note_articles art
			LEFT JOIN note_categories cat
				ON cat.category_id = art.article_cat
			ORDER BY article_id DESC
			LIMIT 0,20
		');
		return $req->fetchAll();
	}

	/*------------------------------------------------------------------------*\
			MODIFIER
	\*------------------------------------------------------------------------*/
	public function updatePhone($id, $phone){

		$req = $this->pdo->prepare('
			UPDATE patients
			SET phone = ?
			WHERE id = ?
		');
		$req->execute([$phone, $id]);

	}

	/*------------------------------------------------------------------------*\
			SUPPRIMER
	\*------------------------------------------------------------------------*/
	public function deletePatient($id){

		$req = $this->pdo->prepare('
			DELETE FROM patients
			WHERE id = ?
		');
		$req->execute([$id]);

	}
}

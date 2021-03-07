<?php
namespace App\Sql;

class Articles extends Table
{
	protected $pdo;

	/*----------------------------------------------------------------------------*\
			AJOUTER
	\*----------------------------------------------------------------------------*/
	public function AddOne($data = []){
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
	public function GetOne($id){

		$req = $this->pdo->prepare('
			SELECT article_title, article_text
			FROM note_articles
			WHERE article_id = ?
		');
		$req->execute([$id]);
		return $req->fetch();
	}

	public function GetAll(){
		$req = $this->pdo->query('
		SELECT *
		FROM note_articles
		ORDER BY article_title
		');
		return $req->fetchAll();
	}

	public function GetByCat($id){
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
	public function GetLast(){
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
	public function UpdateOne($id, $phone){

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
	public function DeleteOne($id){

		$req = $this->pdo->prepare('
			DELETE FROM patients
			WHERE id = ?
		');
		$req->execute([$id]);
	}
}

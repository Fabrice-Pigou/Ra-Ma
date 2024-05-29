<?php
namespace App\Sql;

/**
 * Class Articles
 * Permet de faire des requetes sur la table articles
 */
class Articles extends Table
{
    /*       AJOUTER
    --------------------------------------------------------------------------*/

    /**
     * AddOne
     * Ajoute un nouveau patient
     * 
     * @param array $data
     * 
     * @return int
     */
    public function AddOne($data = []): int
    {
        $req = $this->pdo->prepare("
            INSERT INTO articles (nom, email, phone)
            VALUES(:nom, :email, :phone)
        ");
        $req->execute([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);

        return $this->pdo->lastInsertId();
    }

    /*       COMPTER
    --------------------------------------------------------------------------*/

    /**
     * CountAll
     * Compte le nombre total d'articles
     * 
     * @return int
     */
    public function CountAll(): int
    {
        $req = $this->pdo->query('
            SELECT COUNT(*) AS nbr
            FROM articles
        ');

        $data = $req->fetch();
        return $data['nbr'];
    }

    /*       LIRE
    --------------------------------------------------------------------------*/

    /**
     * GetLast
     * Récupère les 20 derniers articles
     * 
     * @return array
     */
    public function GetLast(){
        $req = $this->pdo->query('
            SELECT article_id, article_title, article_url, category_name,
            DATE_FORMAT(term, "%d/%m/%Y %Hh%imin%ss") AS date
            FROM note_articles art
            LEFT JOIN note_categories cat
                ON cat.category_id = art.article_cat
            ORDER BY article_id DESC
            LIMIT 0,20
        ');
        return $req->fetchAll();
    }

    /*       MODIFIER
    --------------------------------------------------------------------------*/

    /**
     * UpdateOne
     *
     * @param  mixed $data
     * @return void
     */
    public function UpdateOne(array $data)
    {
        $req = $this->pdo->prepare('
            UPDATE articles
            SET phone = ?, name = ?
            WHERE id = ?
        ');
        $req->execute([$data['phone'], $data['name'], $data['id']]);
    }

    /*       SUPPRIMER
    --------------------------------------------------------------------------*/

    /**
     * DeleteOne
     * Supprime une entrée
     * 
     * @param $id
     */
    public function DeleteOne($id)
    {
        $req = $this->pdo->prepare('
            DELETE FROM articles
            WHERE id = ?
        ');
        $req->execute([$id]);
    }
}

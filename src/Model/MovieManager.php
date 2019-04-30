<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 16/04/19
 * Time: 09:36
 */

namespace App\Model;

class MovieManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'movie';


    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     *  Get all movies with their posters
     */
    public function getAllMoviesWithPoster()
    {
        $sql = 'SELECT * FROM ' . self::TABLE . ' AS m' .
                ' INNER JOIN ' . PosterManager::TABLE . ' AS p ON p.p_movieID = m.movieID';

        return $this->pdo->query($sql)->fetchAll();
    }

    public function getOneWithPoster(int $id)
    {
        $sql = 'SELECT * FROM ' . self::TABLE . ' AS m' .
            ' INNER JOIN ' . PosterManager::TABLE . ' AS p ON p.p_movieID = m.movieID' .
            ' WHERE m.movieID = ' . $id;

        $prepared = $this->pdo->prepare($sql);
        $prepared->bindValue('id', $id, \PDO::PARAM_INT);

        $prepared->execute();
        return $prepared->fetch();
    }

    public function selectAllBySearch(string $search) : array
    {

        $search = str_replace(' ', '%', $search);

        $sql = 'SELECT * FROM ' . self::TABLE . ' AS m
                LEFT JOIN ' . PosterManager::TABLE . ' AS p ON p.p_movieID = m.movieID
                WHERE movieTitle LIKE :title
                OR movieDesc LIKE :desc';

        $prepared = $this->pdo->prepare($sql);

        $prepared->bindValue(':title', '%' . $search . '%', \PDO::PARAM_STR);
        $prepared->bindValue(':desc', '%' . $search . '%', \PDO::PARAM_STR);
        $prepared->execute();
        return $prepared->fetchAll();
    }
}

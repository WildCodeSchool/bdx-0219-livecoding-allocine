<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ActorManager;
use App\Model\GenreManager;
use App\Model\MovieManager;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->getAllMoviesWithPoster();

        $personManager= new ActorManager();
        $persons = $personManager->selectAll();

        $genreManager = new GenreManager();
        $genres = $genreManager->selectAll();


        return $this->twig->render(
            'Home/index.html.twig',
            [
                'movies' => $movies,
                'persons' => $persons,
                'genres' => $genres
            ]
        );
    }
}

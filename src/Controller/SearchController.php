<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 30/04/19
 * Time: 11:14
 */

namespace App\Controller;

use App\Model\MovieManager;

class SearchController extends AbstractController
{
    public function results()
    {

        $movieManager = new MovieManager();
        $movies = $movieManager->selectAllBySearch($_GET['search']);

        return $this->twig->render('Search/results.html.twig', ['movies' => $movies]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 16/04/19
 * Time: 10:25
 */

namespace App\Controller;


use App\Model\MovieManager;

class MovieController extends AbstractController
{

    public function details($id, $title)
    {
        $movieManager = new MovieManager();
        $movie = $movieManager->getOneWithPoster($id);

        return $this->twig->render("Movie/details.html.twig",
            ['movie' => $movie]
        );

    }
}
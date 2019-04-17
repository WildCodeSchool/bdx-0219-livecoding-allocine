<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 16/04/19
 * Time: 10:15
 */

namespace App\Model;

class PosterManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'poster';


    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}

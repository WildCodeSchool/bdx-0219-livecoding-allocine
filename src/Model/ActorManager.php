<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 16/04/19
 * Time: 09:42
 */

namespace App\Model;


class ActorManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'person';


    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
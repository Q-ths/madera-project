<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 06/12/18
 * Time: 11:55
 */

namespace App\Model\DatabaseTrait;


use Cake\ORM\Query;

trait FindAll
{
    public function findAll(Query $query, array $options)
    {
        $query->where([
            'date_out is' => NULL
        ]);
        return Parent::findAll($query,$options);
    }
}
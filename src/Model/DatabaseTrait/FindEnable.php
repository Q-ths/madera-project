<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 06/01/19
 * Time: 00:37
 */

namespace App\Model\DatabaseTrait;
use Cake\ORM\Query;

trait FindEnable
{
    public function findEnable(Query $query, array $options)
    {
        if(isset($options['table'])) {
            $query->where([$options['table'] .'.date_out IS' => null]);
        } else {
            $query->order(['date_out', 'nom ASC']);
        }
        return $query;
        return $query;
    }
}
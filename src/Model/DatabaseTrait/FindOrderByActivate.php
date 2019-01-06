<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 06/01/19
 * Time: 00:37
 */

namespace App\Model\DatabaseTrait;
use Cake\ORM\Query;

trait FindOrderByActivate
{
    public function findOrderByActivate(Query $query, array $options)
    {
        if(isset($options['table'])) {
            $query->order([$options['table'] .'.date_out', $options['table'] .'.nom ASC']);
        } else {
            $query->order(['date_out', 'nom ASC']);
        }
        return $query;
    }
}
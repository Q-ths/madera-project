<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property int $id
 * @property int $module_id
 * @property float $longueur
 * @property float $angle_entrant
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 *
 * @property \App\Model\Entity\Module $module
 * @property \App\Model\Entity\User $user
 */
class Section extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'module_id' => true,
        'longueur' => true,
        'angle_entrant' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'module' => true,
        'user' => true
    ];
}

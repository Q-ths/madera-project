<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cctp Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Module[] $module
 */
class Cctp extends Entity
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
        'nom' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'user' => true,
        'module' => true
    ];
}

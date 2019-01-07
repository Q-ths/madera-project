<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProfilDroit Entity
 *
 * @property int $id
 * @property int $profil_id
 * @property int $droit_id
 *
 * @property \App\Model\Entity\Profil $profil
 * @property \App\Model\Entity\Droit $droit
 */
class ProfilDroit extends Entity
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
        'profil_id' => true,
        'droit_id' => true,
        'profil' => true,
        'droit' => true
    ];
}

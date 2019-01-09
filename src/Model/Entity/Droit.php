<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Droit Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $valeur
 * @property int $application_module_id
 *
 * @property \App\Model\Entity\ApplicationModule $application_module
 * @property \App\Model\Entity\Profil[] $profil
 */
class Droit extends Entity
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
        'valeur' => true,
        'application_module_id' => true,
        'application_module' => true,
        'profil' => true
    ];
}

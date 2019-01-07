<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModuleProjet Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $marge
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 * @property int $projet_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Projet $projet
 * @property \App\Model\Entity\ModuleComposantProjet[] $module_composant_projet
 */
class ModuleProjet extends Entity
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
        'marge' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'projet_id' => true,
        'user' => true,
        'projet' => true,
        'module_composant_projet' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModuleComposantProjet Entity
 *
 * @property int $id
 * @property string $nom
 * @property float $prix_achat
 * @property float $pourcentage_marge
 * @property float $tva
 * @property int $quantite
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 * @property int $module_projet_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ModuleProjet $module_projet
 */
class ModuleComposantProjet extends Entity
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
        'prix_achat' => true,
        'pourcentage_marge' => true,
        'tva' => true,
        'quantite' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'module_projet_id' => true,
        'user' => true,
        'module_projet' => true
    ];
}

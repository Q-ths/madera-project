<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Composant Entity
 *
 * @property int $id
 * @property int $famille_composant_id
 * @property int $tva_id
 * @property int $fournisseur_id
 * @property string $nom
 * @property float $prix_achat
 * @property float $pourcentage_marge
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 *
 * @property \App\Model\Entity\FamilleComposant $famille_composant
 * @property \App\Model\Entity\Tva $tva
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Module[] $module
 */
class Composant extends Entity
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
        'famille_composant_id' => true,
        'tva_id' => true,
        'fournisseur_id' => true,
        'nom' => true,
        'prix_achat' => true,
        'pourcentage_marge' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'famille_composant' => true,
        'tva' => true,
        'fournisseur' => true,
        'user' => true,
        'module' => true
    ];
}

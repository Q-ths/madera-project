<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Devi Entity
 *
 * @property int $id
 * @property int $projet_id
 * @property int $type_statut_id
 * @property string $client_nom
 * @property string $client_prenom
 * @property int $adresse_numero
 * @property string $adresse
 * @property int $code_postal
 * @property string $ville
 * @property float $pourcentage_remise
 * @property float $prix_total_ttc
 * @property float $prix_total_ht
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 *
 * @property \App\Model\Entity\Projet $projet
 * @property \App\Model\Entity\TypeStatut $type_statut
 * @property \App\Model\Entity\User $user
 */
class Devis extends Entity
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
        'projet_id' => true,
        'type_statut_id' => true,
        'client_nom' => true,
        'client_prenom' => true,
        'adresse_numero' => true,
        'adresse' => true,
        'code_postal' => true,
        'ville' => true,
        'pourcentage_remise' => true,
        'prix_total_ttc' => true,
        'prix_total_ht' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'projet' => true,
        'type_statut' => true,
        'user' => true
    ];
}

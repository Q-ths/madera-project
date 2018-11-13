<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EchelonnementPayement Entity
 *
 * @property int $id
 * @property int $type_echelonnement_payement_id
 * @property int $devis_id
 *
 * @property \App\Model\Entity\TypeEchelonnementPayement $type_echelonnement_payement
 * @property \App\Model\Entity\Devi $devi
 */
class EchelonnementPayement extends Entity
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
        'type_echelonnement_payement_id' => true,
        'devis_id' => true,
        'type_echelonnement_payement' => true,
        'devi' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Element Entity
 *
 * @property int $id
 * @property int $devis_id
 * @property string $libelle_module
 * @property string $cctp
 * @property int $unite
 * @property int $quanite
 * @property string $coupe_principe
 * @property float $prix_ht
 * @property float $tva
 *
 * @property \App\Model\Entity\Devi $devi
 */
class Element extends Entity
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
        'devis_id' => true,
        'libelle_module' => true,
        'cctp' => true,
        'unite' => true,
        'quanite' => true,
        'coupe_principe' => true,
        'prix_ht' => true,
        'tva' => true,
        'devi' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ComposantModule Entity
 *
 * @property int $id
 * @property int $module_id
 * @property int $composant_id
 *
 * @property \App\Model\Entity\Module $module
 * @property \App\Model\Entity\Composant $composant
 */
class ComposantModule extends Entity
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
        'composant_id' => true,
        'module' => true,
        'composant' => true
    ];
}

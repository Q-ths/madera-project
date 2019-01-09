<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projet Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $utilisateur_id
 * @property \Cake\I18n\FrozenTime $date_creation
 * @property string $nom
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\User $responsable
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Devi[] $devis
 * @property \App\Model\Entity\Module[] $module
 */
class Projet extends Entity
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
        'client_id' => true,
        'utilisateur_id' => true,
        'date_creation' => true,
        'nom' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'client' => true,
        'responsable' => true,
        'user' => true,
        'devis' => true,
        'module' => true
    ];
}

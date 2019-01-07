<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property int $adresse_numero
 * @property string $adresse
 * @property int $code_postal
 * @property string $ville
 * @property string $email
 * @property string $telephone
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Projet[] $projet
 */
class Client extends Entity
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
        'prenom' => true,
        'adresse_numero' => true,
        'adresse' => true,
        'code_postal' => true,
        'ville' => true,
        'email' => true,
        'telephone' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'user' => true,
        'projet' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity
 *
 * @property int $id
 * @property int $projet_id
 * @property int $cctp_id
 * @property int $gamme_id
 * @property int $coupe_principe_id
 * @property string $nom
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $derniere_date_modification
 * @property \Cake\I18n\FrozenTime $date_in
 * @property \Cake\I18n\FrozenTime $date_out
 *
 * @property \App\Model\Entity\Projet $projet
 * @property \App\Model\Entity\Cctp $cctp
 * @property \App\Model\Entity\Gamme $gamme
 * @property \App\Model\Entity\CoupePrincipe $coupe_principe
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Section[] $section
 * @property \App\Model\Entity\Composant[] $composant
 */
class Module extends Entity
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
        'cctp_id' => true,
        'gamme_id' => true,
        'coupe_principe_id' => true,
        'nom' => true,
        'user_id' => true,
        'derniere_date_modification' => true,
        'date_in' => true,
        'date_out' => true,
        'projet' => true,
        'cctp' => true,
        'gamme' => true,
        'coupe_principe' => true,
        'user' => true,
        'section' => true,
        'composant' => true
    ];
}

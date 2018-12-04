<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $nom
 * @property string $prenom
 * @property string $poste
 *
 * @property \App\Model\Entity\Cctp[] $cctp
 * @property \App\Model\Entity\Client[] $client
 * @property \App\Model\Entity\Composant[] $composant
 * @property \App\Model\Entity\CoupePrincipe[] $coupe_principe
 * @property \App\Model\Entity\Devi[] $devis
 * @property \App\Model\Entity\FamilleComposant[] $famille_composant
 * @property \App\Model\Entity\Fournisseur[] $fournisseur
 * @property \App\Model\Entity\Gamme[] $gamme
 * @property \App\Model\Entity\Module[] $module
 * @property \App\Model\Entity\Projet[] $projet
 * @property \App\Model\Entity\Section[] $section
 * @property \App\Model\Entity\Tva[] $tva
 * @property \App\Model\Entity\TypeCouverture[] $type_couverture
 * @property \App\Model\Entity\TypeFinissionExterieur[] $type_finission_exterieur
 * @property \App\Model\Entity\TypeIsolant[] $type_isolant
 * @property \App\Model\Entity\TypeQualiteHuisserie[] $type_qualite_huisserie
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'nom' => true,
        'prenom' => true,
        'poste' => true,
        'cctp' => true,
        'client' => true,
        'composant' => true,
        'coupe_principe' => true,
        'devis' => true,
        'famille_composant' => true,
        'fournisseur' => true,
        'gamme' => true,
        'module' => true,
        'projet' => true,
        'section' => true,
        'tva' => true,
        'type_couverture' => true,
        'type_finission_exterieur' => true,
        'type_isolant' => true,
        'type_qualite_huisserie' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}

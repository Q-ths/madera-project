<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
 * @property \App\Model\Entity\Client[] $client
 * @property \App\Model\Entity\Composant[] $composant
 * @property \App\Model\Entity\Devi[] $devis
 * @property \App\Model\Entity\FamilleComposant[] $famille_composant
 * @property \App\Model\Entity\Fournisseur[] $fournisseur
 * @property \App\Model\Entity\Gamme[] $gamme
 * @property \App\Model\Entity\Module[] $module
 * @property \App\Model\Entity\ModuleComposantProjet[] $module_composant_projet
 * @property \App\Model\Entity\ModuleProjet[] $module_projet
 * @property \App\Model\Entity\Projet[] $projet
 * @property \App\Model\Entity\Tva[] $tva
 * @property \App\Model\Entity\TypeFinition[] $type_finition
 * @property \App\Model\Entity\TypeIsolant[] $type_isolant
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
        'client' => true,
        'composant' => true,
        'devis' => true,
        'famille_composant' => true,
        'fournisseur' => true,
        'gamme' => true,
        'module' => true,
        'module_composant_projet' => true,
        'module_projet' => true,
        'projet' => true,
        'tva' => true,
        'type_finition' => true,
        'type_isolant' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

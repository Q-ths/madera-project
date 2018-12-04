<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * User Model
 *
 * @property \App\Model\Table\CctpTable|\Cake\ORM\Association\HasMany $Cctp
 * @property \App\Model\Table\ClientTable|\Cake\ORM\Association\HasMany $Client
 * @property \App\Model\Table\ComposantTable|\Cake\ORM\Association\HasMany $Composant
 * @property \App\Model\Table\CoupePrincipeTable|\Cake\ORM\Association\HasMany $CoupePrincipe
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\HasMany $Devis
 * @property \App\Model\Table\FamilleComposantTable|\Cake\ORM\Association\HasMany $FamilleComposant
 * @property \App\Model\Table\FournisseurTable|\Cake\ORM\Association\HasMany $Fournisseur
 * @property \App\Model\Table\GammeTable|\Cake\ORM\Association\HasMany $Gamme
 * @property \App\Model\Table\ModuleTable|\Cake\ORM\Association\HasMany $Module
 * @property \App\Model\Table\ProjetTable|\Cake\ORM\Association\HasMany $Projet
 * @property \App\Model\Table\SectionTable|\Cake\ORM\Association\HasMany $Section
 * @property \App\Model\Table\TvaTable|\Cake\ORM\Association\HasMany $Tva
 * @property \App\Model\Table\TypeCouvertureTable|\Cake\ORM\Association\HasMany $TypeCouverture
 * @property \App\Model\Table\TypeFinissionExterieurTable|\Cake\ORM\Association\HasMany $TypeFinissionExterieur
 * @property \App\Model\Table\TypeIsolantTable|\Cake\ORM\Association\HasMany $TypeIsolant
 * @property \App\Model\Table\TypeQualiteHuisserieTable|\Cake\ORM\Association\HasMany $TypeQualiteHuisserie
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UserTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('user');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Cctp', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Client', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Composant', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('CoupePrincipe', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Devis', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('FamilleComposant', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Fournisseur', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Gamme', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Module', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Projet', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Section', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tva', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TypeCouverture', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TypeFinissionExterieur', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TypeIsolant', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TypeQualiteHuisserie', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 25)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('prenom')
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->scalar('poste')
            ->maxLength('poste', 255)
            ->requirePresence('poste', 'create')
            ->notEmpty('poste');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Composant Model
 *
 * @property \App\Model\Table\FamilleComposantTable|\Cake\ORM\Association\BelongsTo $FamilleComposant
 * @property \App\Model\Table\TvaTable|\Cake\ORM\Association\BelongsTo $Tva
 * @property \App\Model\Table\FournisseurTable|\Cake\ORM\Association\BelongsTo $Fournisseur
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ModuleTable|\Cake\ORM\Association\BelongsToMany $Module
 *
 * @method \App\Model\Entity\Composant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Composant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Composant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Composant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Composant|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Composant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Composant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Composant findOrCreate($search, callable $callback = null, $options = [])
 */
class ComposantTable extends Table
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

        $this->setTable('composant');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FamilleComposant', [
            'foreignKey' => 'famille_composant_id'
        ]);
        $this->belongsTo('Tva', [
            'foreignKey' => 'tva_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fournisseur', [
            'foreignKey' => 'fournisseur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Module', [
            'foreignKey' => 'composant_id',
            'targetForeignKey' => 'module_id',
            'joinTable' => 'composant_module'
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
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->decimal('prix_achat')
            ->requirePresence('prix_achat', 'create')
            ->notEmpty('prix_achat');

        $validator
            ->decimal('pourcentage_marge')
            ->requirePresence('pourcentage_marge', 'create')
            ->notEmpty('pourcentage_marge');

        $validator
            ->dateTime('derniere_date_modification')
            ->requirePresence('derniere_date_modification', 'create')
            ->notEmpty('derniere_date_modification');

        $validator
            ->dateTime('date_in')
            ->requirePresence('date_in', 'create')
            ->notEmpty('date_in');

        $validator
            ->dateTime('date_out')
            ->requirePresence('date_out', 'create')
            ->notEmpty('date_out');

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
        $rules->add($rules->existsIn(['famille_composant_id'], 'FamilleComposant'));
        $rules->add($rules->existsIn(['tva_id'], 'Tva'));
        $rules->add($rules->existsIn(['fournisseur_id'], 'Fournisseur'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModuleComposantProjet Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ModuleProjetTable|\Cake\ORM\Association\BelongsTo $ModuleProjet
 *
 * @method \App\Model\Entity\ModuleComposantProjet get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModuleComposantProjet findOrCreate($search, callable $callback = null, $options = [])
 */
class ModuleComposantProjetTable extends Table
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

        $this->setTable('module_composant_projet');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('ModuleProjet', [
            'foreignKey' => 'module_projet_id',
            'joinType' => 'INNER'
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
            ->numeric('prix_achat')
            ->requirePresence('prix_achat', 'create')
            ->notEmpty('prix_achat');

        $validator
            ->numeric('pourcentage_marge')
            ->requirePresence('pourcentage_marge', 'create')
            ->notEmpty('pourcentage_marge');

        $validator
            ->numeric('tva')
            ->requirePresence('tva', 'create')
            ->notEmpty('tva');

        $validator
            ->integer('quantite')
            ->allowEmpty('quantite');

        $validator
            ->dateTime('derniere_date_modification')
            ->allowEmpty('derniere_date_modification');

        $validator
            ->dateTime('date_in')
            ->allowEmpty('date_in');

        $validator
            ->dateTime('date_out')
            ->allowEmpty('date_out');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['module_projet_id'], 'ModuleProjet'));

        return $rules;
    }
}
